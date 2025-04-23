<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;

interface PostRepositoryInterface
{
    public function getAllPosts():Collection;

    public function getPosts(string $query):Collection;
}
