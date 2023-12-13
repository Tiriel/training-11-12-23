<?php

namespace App;

use App\Database\Repository;
use App\Routing\Request;

class Controller
{
    public function __construct(protected readonly Repository $repository)
    {
    }

    public function index(): void
    {
        $posts = $this->repository->getPosts();

        include './templates/index.php';
    }

    public function post(Request $request): void
    {
        $id = $request->getQuery()['id'];
        $post = $this->repository->getPost($id);

        include "./templates/post.php";
    }

    public function form(): void
    {
        include "./templates/form.php";
    }

    public function addPost(Request $request): void
    {
        $data = $request->getData();
        $this->repository->insertPost($data['title'], $data['author'], $data['content']);

        header('Location: /');
    }
}
