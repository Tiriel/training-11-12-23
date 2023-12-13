<?php

namespace App;

use App\Database\Repository;
use App\Routing\Request;
use Twig\Environment;

class Controller
{
    public function __construct(
        protected readonly Repository $repository,
        protected readonly Environment $twig
    ) {
    }

    public function index(): void
    {
        $posts = $this->repository->getPosts();

        echo $this->twig->render('index.html.twig', ['posts' => $posts]);
    }

    public function post(Request $request): void
    {
        $id = $request->getQuery()['id'];
        $post = $this->repository->getPost($id);

        echo $this->twig->render('get_post.html.twig', ['post' => $post]);
    }

    public function form(): void
    {
        echo $this->twig->render('form.html.twig');
    }

    public function addPost(Request $request): void
    {
        $data = $request->getData();
        $this->repository->insertPost($data['title'], $data['author'], $data['content']);

        header('Location: /');
    }
}
