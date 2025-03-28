<?php

namespace App\Http\Controllers;

use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Resources\PostListResource;
use App\Models\Posts;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function loadMorePosts()
    {
        $posts =Posts::query()
            ->orderBy('id','desc')
            ->get();
        return response(PostListResource::collection($posts),200);
    }

    public function getPosts(Request $request)
    {
        $query = $request->get('query');
        $posts_query = Posts::query();
        if(!is_null($query)){
            $posts = $posts_query->where('title','like','%'.$query.'%')
                ->get();
            return response(PostListResource::collection($posts),200);
        }
        return response(PostListResource::collection($posts_query->get()),200);
    }

    public function store(CreatePostRequest $request)
    {

    }
}
