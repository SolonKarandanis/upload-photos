<?php

namespace App\Services;

use App\Dtos\PostDto;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

interface PostServiceInterface
{

    public function getAllPosts():Collection;

    public function getPosts(string $query):Collection;

    public function createPost(PostDto $postDto): Builder|Posts| null;

    public function updatePost(PostDto $postDto, int $postId): Builder| Posts| null;

    public function getPostById(int $id): Builder|Posts;

    public function deletePost(int $postId): void;
}
