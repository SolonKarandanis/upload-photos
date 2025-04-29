<?php

namespace App\Dtos;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\UploadedFile;

class PostDto implements DtoInterface
{

    private string $title;
    private string $postConent;
    private string $createdBy;
    private array|UploadedFile|null $image;

    private array $categories;
    public static function fromApiFormRequest(FormRequest $request): DtoInterface
    {
        $postDto = new PostDto();
        $postDto->setTitle($request->get('title'));
        $postDto->setPostConent($request->get('postContent'));
        $postDto->setCreatedBy($request->user()->id);
        $postDto->setImage($request->file('image'));
        $categories_array=json_decode($request->categories);
        $postDto->setCategories($categories_array);
        return $postDto;
    }

    public static function fromModel(Posts | Model $model): PostDto
    {
        $postDto = new PostDto();
        $postDto->setTitle($model->title);
        $postDto->setCreatedBy($model->createdBy);
        return $postDto;
    }

    public static function toArray(Posts | Model $model): array
    {
        return [
            'title' => $model->title,
        ];
    }


    public function getTitle(): string
    {
        return $this->title;
    }

    public function setTitle(string $title): void
    {
        $this->title = $title;
    }

    public function getPostConent(): string
    {
        return $this->postConent;
    }

    public function setPostConent(string $postConent): void
    {
        $this->postConent = $postConent;
    }

    public function getCreatedBy(): string
    {
        return $this->createdBy;
    }

    public function setCreatedBy(string $createdBy): void
    {
        $this->createdBy = $createdBy;
    }

    public function getCategories(): array
    {
        return $this->categories;
    }

    public function setCategories(array $categories): void
    {
        $this->categories = $categories;
    }

    public function getImage(): array|UploadedFile|null
    {
        return $this->image;
    }

    public function setImage(array|UploadedFile|null $image): void
    {
        $this->image = $image;
    }
}
