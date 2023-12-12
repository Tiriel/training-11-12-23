<?php

namespace App\Database;

use App\Database\Model\Post;
use PDO;

class Persister
{

    public function __construct(private readonly Connection $connection)
    {
    }

    public function writeToDatabase(string $table, array $data): void
    {
        $data = array_map(function ($v) {
            return $v instanceof \DateTimeInterface
                ? $v->format('Y-m-d H:i:s')
                : $v;
        }, $data);

        $conn = $this->connection->getConnection();

        $fields = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));

        $stmt = $conn->prepare("INSERT INTO $table ($fields) VALUES ($values)");
        $stmt->execute(array_values($data));
    }

    public function getPosts(): array
    {
        $conn = $this->connection->getConnection();
        $stmt = $conn->query("SELECT * FROM posts");

        $posts = [];
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $postData) {
            $posts[] = $this->hydratePost($postData);
        }

        return $posts;
    }

    public function getPostById(int $postId): ?Post
    {
        $conn = $this->connection->getConnection();
        $stmt = $conn->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$postId]);

        $postData = $stmt->fetch(PDO::FETCH_ASSOC);

        return $postData ? $this->hydratePost($postData) : null;
    }

    private function hydratePost(array $postData): Post
    {
        return new Post(
            $postData['title'],
            $postData['content'],
            $postData['author'],
            $postData['date'],
            $postData['id']
        );
    }
}
