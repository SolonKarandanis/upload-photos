<?php

namespace App\Http\Controllers;

use App\Dtos\PostDto;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Resources\PostListResource;
use App\Http\Resources\PostResource;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PostController extends Controller
{
    public function __construct(private readonly PostService $postService){
        $this->middleware('verifyCategoriesCount')->only(['store']);
    }
    public function loadMorePosts()
    {
        $posts = $this->postService->getAllPosts();
        return response(PostListResource::collection($posts),200);
    }

    public function getPosts(Request $request)
    {
        $query = $request->get('query');
        $posts = $this->postService->getPosts($query);
        return response(PostListResource::collection($posts),200);
    }

    public function store(CreatePostRequest $request)
    {
        $user=$request->user();
        Log::info('Showing the user profile for user: {$user}', ['$user' => $user]);
        $postDto = PostDto::fromAPiFormRequest($request);
        $post = $this->postService->createPost($postDto);
        Log::info('Created Post : {$post}', ['$post' => $post]);
        return response(new PostResource($post), 201);
    }

    public function update(UpdatePostRequest $request, int $postId)
    {
        $postDto = PostDto::fromAPiFormRequest($request);
        $post = $this->postService->updatePost($postDto, $postId);
        return response(new PostResource($post), 200);
//        $user->trophies()->detach(); //leave the detach function empty
//        $user->trophies()->detach($trophyIds);
    }

    public function destroy(int $id)
    {
       $this->postService->deletePost($id);
        return response(null, 204);
    }

    public function show(int $id)
    {
        $post = $this->postService->getPostById($id);
        return response(new PostResource($post), 200);
    }
}
