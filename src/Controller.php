<?php

namespace App;

use App\Database\Repository;

class Controller
{
    public function __construct(protected readonly Repository $repository)
    {
    }

    public function index(): void
    {
        echo '<h1>Homepage</h1>';
    }

    public function post(): void
    {
        //
    }

    public function form(): void
    {
        //
    }

    public function addPost(): void
    {
        //
    }
}
