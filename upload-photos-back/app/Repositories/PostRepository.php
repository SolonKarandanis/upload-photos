<?php

namespace App\Repositories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Collection;

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
}
