<?php

namespace App;

use App\Database\Connection;
use App\Database\Model\Comment;
use App\Database\Model\Post;
use App\Database\Persister;

class Controller
{
    public function __construct(private readonly Persister $persister)
    {
    }

    public function postForm(): void
    {
        echo <<<EOD
      <form action="/add-post" method="post" role="form">
        <div>
          <input type="text" name="author" placeholder="Author"/>
        </div>
        <div>
          <input type="text" name="title" placeholder="Title"/>
        </div>
        <div>
          <textarea name="content"></textarea>
        </div>
        <div>
           <input type="submit" name="Submit" value="Publish" />
        </div>
      </form>
EOD;
    }

    public function addPost(string $title, string $content, string $author): void
    {
        $post = new Post($title, $content, $author, new \DateTimeImmutable());
        $data = [
            'title' => $post->getTitle(),
            'content' => $post->getContent(),
            'author' => $post->getAuthor(),
            'date' => $post->getDate(),
        ];

        $this->persister->writeToDatabase('posts', $data);

        $this->displayBlog();
    }

    public function displayPost(int $postId): void
    {
        if ($post = $this->persister->getPostById($postId)) {
            $post->displayPost();

            return;
        }
        echo "Post not found\n";
    }

    public function displayBlog(): void
    {
        echo "<h1>Homepage</h1>";
        foreach ($this->persister->getPosts() as $post) {
            $post->displayPost();
            echo "-----------------<br>";
        }
    }
}
