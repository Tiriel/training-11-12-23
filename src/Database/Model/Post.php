<?php

namespace App\Database\Model;

class Post
{
    private ?int $id;
    private string $title;
    private string $content;
    private string $author;
    private \DateTimeImmutable $date;

    public function __construct(string $title, string $content, string $author, string|\DateTimeImmutable $date, ?int $id = null)
    {
        if (is_string($date)) {
            $date = new \DateTimeImmutable($date);
        }
        $this->id = $id;
        $this->title = $title;
        $this->content = $content;
        $this->author = $author;
        $this->date = $date;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): Post
    {
        $this->title = $title;
        return $this;
    }

    public function getContent(): string
    {
        return $this->content;
    }

    public function setContent(string $content): Post
    {
        $this->content = $content;
        return $this;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function setAuthor(string $author): Post
    {
        $this->author = $author;
        return $this;
    }

    public function getDate(): \DateTimeImmutable
    {
        return $this->date;
    }

    public function setDate(string|\DateTimeImmutable $date): Post
    {
        if (is_string($date)) {
            $date = new \DateTimeImmutable($date);
        }
        $this->date = $date;
        return $this;
    }

    public function displayPost(): void
    {
        echo "<ul>";
        echo "<li>Post ID: {$this->id}</li>";
        echo "<li>Title: {$this->title}</li>";
        echo "<li>Content: {$this->content}</li>";
        echo "<li>Author: {$this->author}</li>";
        echo "<li>Date: {$this->date->format('d M Y - H:i:s')}</li>";
        echo "</ul>";

    }
}
