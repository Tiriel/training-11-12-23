<?php

namespace App\Database;

use App\Database\Model\Post;

class Repository
{
    public function __construct(
        protected readonly \PDO $connection,
        protected readonly PostMapper $mapper,
    ) {
    }

    public function insertPost(string $title, string $author, string $content): void
    {
        $stmt = $this->connection->prepare("INSERT INTO posts (title, author, content, date) VALUES (?, ?, ?, ?)");
        $stmt->execute([$title, $author, $content, (new \DateTimeImmutable())->format('Y-m-d H:i:s')]);
    }

    public function getPost(int $id): Post
    {
        $stmt = $this->connection->prepare("SELECT * FROM posts WHERE id = ?");
        $stmt->execute([$id]);

        return $this->mapper->map($stmt->fetch(\PDO::FETCH_ASSOC));
    }

    public function getPosts(): array
    {
        $stmt = $this->connection->query("SELECT * FROM posts");
        $posts = [];
        foreach ($stmt->fetchAll(\PDO::FETCH_ASSOC) as $postData) {
            $posts[] = $this->mapper->map($postData);
        }

        return $posts;
    }
}
