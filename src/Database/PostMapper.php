<?php

namespace App\Database;

use App\Database\Model\Post;

class PostMapper
{
    public function map(array $data): Post
    {
        return new Post(
            $data['title'],
            $data['author'],
            $data['content'],
            new \DateTimeImmutable($data['date']),
            $data['id'] ?? null,
        );
    }
}
