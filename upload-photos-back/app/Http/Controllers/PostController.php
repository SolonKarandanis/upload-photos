<?php

namespace App\Http\Controllers;

use App\Dtos\PostDto;
use App\Http\Requests\AddPostImageRequest;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\Posts\UpdatePostRequest;
use App\Http\Resources\PostListResource;
use App\Http\Resources\PostResource;
use App\Models\Posts;
use App\Services\PostService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class PostController extends Controller
{
    public function __construct(public readonly PostService $postService){
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

    public function update(UpdatePostRequest $request, Posts $post)
    {
//        if ($request->user()->isDirty('email')) {
//            $request->user()->email_verified_at = null;
//        }
        $post->title = $request->title;
        $post->slug = $this->generateSlug($request->title);
        $post->post_content = $request->post_content;
        $post->categories()->sync($request->categories);
        $post->save();
        return response(new PostResource($post), 200);
//        $user->trophies()->detach(); //leave the detach function empty
//        $user->trophies()->detach($trophyIds);
    }

    private function generateSlug($title):string
    {
        $randomNumber = Str::random(6) . time();
        return Str::slug($title). '-' . $randomNumber;
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

    public function getPostBySlug($slug)
    {

    }

    public function addImage(AddPostImageRequest $request)
    {

    }
}
