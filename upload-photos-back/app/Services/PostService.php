<?php

namespace App\Services;

use App\Dtos\PostDto;
use App\Models\Posts;
use App\Repositories\PostRepository;
use App\Services\PostServiceInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;

class PostService implements PostServiceInterface
{

    public function __construct(public readonly PostRepository $postRepository)
    {
    }
    public function getAllPosts(): Collection
    {
       return $this->postRepository->getAllPosts();
    }

    public function getPosts(string $query): Collection
    {
        return $this->postRepository->getPosts($query);
    }

    public function createPost(PostDto $postDto): Builder|Posts| null
    {
        try{
            DB::beginTransaction();
            $path = $postDto->getImage()->store('images', 'public');
            $postDto->setPath($path);
            $post = $this->postRepository->createPost($postDto);
            DB::commit();
            return $post;
        }
        catch(\Exception $e){
            DB::rollBack();
            return null;
        }
    }

    public function updatePost(PostDto $postDto, int $postId): Builder|Posts
    {
        $post = $this->getPostById($postId);
        return $this->postRepository->updatePost($post, $postDto->getCategories());
    }

    public function getPostById(int $id): Builder|Posts
    {
        $post = $this->postRepository->getPostById($id);
        if (!$post) {
            throw new ModelNotFoundException("Post not found");
        }
        return $post;
    }

    public function deletePost(int $postId): void
    {
        $post = $this->getPostById($postId);
        try{
            DB::beginTransaction();
            $post->deleteImage();
            $post->delete();
            DB::commit();
        }
        catch(\Exception $e){
            DB::rollBack();
        }
    }
}
