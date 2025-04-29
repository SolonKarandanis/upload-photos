<?php

namespace App\Repositories;

use App\Dtos\PostDto;
use App\Models\Posts;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PostRepository implements PostRepositoryInterface
{

    public function getAllPosts(): Collection
    {
        return Posts::query()
            ->orderBy('id','desc')
            ->get();
    }

    public function getPosts(string $query): Collection
    {
        $posts_query = Posts::query();
        if(!is_null($query)){
            return $posts_query->where('title','like','%'.$query.'%')
                ->get();
        }
        return $posts_query->get();
    }

    public function createPost(PostDto $postDto): Builder|Model
    {
        $post = Posts::query()->create([
            'title' => $postDto->getTitle(),
            'slug' => $postDto->getSlug(),
            'post_content' => $postDto->getPostConent(),
            'created_by' => $postDto->getCreatedBy(),
            'image' => $postDto->getPath(),
        ]);
        $post->categories()->attach($postDto->getCategories());
        return $post;
    }

    public function updatePost(Posts $post,array $categories): Builder|Model
    {
        $post->categories()->sync($categories);
        $post->save();
        return $post;
    }

    public function getPostById(int $id): Model|Collection
    {
        return Posts::query()->where('id', $id)->first();
    }
}
