<?php

namespace App\Repositories;

use App\Dtos\PostDto;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface PostRepositoryInterface
{
    public function modelQuery(): Builder;
    public function getAllPosts():Collection;

    public function getPosts(string $query):Collection;

    public function createPost(PostDto $postDto): Builder|Posts;

    public function updatePost(Posts $post, array $categories): Builder| Posts;

    public function getPostById(int $id): Posts;
}
