<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddPostImageRequest;
use App\Http\Requests\Posts\CreatePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Resources\PostListResource;
use App\Http\Resources\PostResource;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $path = $request->file('image')->store('images', 'public');
        $post = Posts::create([
            'title' => $request->title,
            'slug' => $this->generateSlug($request->title),
            'post_content' => $request->post_content,
            'image' => $path,

        ])->categories()->attach($request->categories);

        return response(new PostResource($post), 200);
    }

    public function update(UpdatePostRequest $request, Posts $post)
    {
        $post->title = $request->title;
        $post->slug = $this->generateSlug($request->title);
        $post->post_content = $request->post_content;
        $post->categories()->sync($request->categories);
        $post->save();
        return response(new PostResource($post), 200);
//        $user->trophies()->detach(); //leave the detach function empty
//        $user->trophies()->detach($trophyIds);
    }

    private function generateSlug($title)
    {
        $randomNumber = Str::random(6) . time();
        $slug = Str::slug($title). '-' . $randomNumber;
        return response($slug);
    }

    public function destroy(Posts $post)
    {
        $post->delete();

        return response(null, 204);
    }

    public function show(Posts $post)
    {
        return response(new PostResource($post), 200);
    }

    public function getPostBySlug($slug)
    {
        $posts=Posts::where('slug',$slug)->with('categories')->get();
    }

    public function addImage(AddPostImageRequest $request)
    {

    }
}
