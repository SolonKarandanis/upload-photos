<?php

namespace App\Repositories;

use App\Dtos\PostDto;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface
{
    public function getAllPosts():Collection;

    public function getPosts(string $query):Collection;

    public function createPost(PostDto $postDto): Builder|Model;

    public function updatePost(PostDto $postDto): Builder| Model;
}
