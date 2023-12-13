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

    public function insertPost(Post $post): void
    {
        //
    }

    public function getPost(int $id): Post
    {
        //
    }

    public function getPosts(): array
    {
        //
    }
}
