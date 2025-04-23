<?php

namespace App\Dtos;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Http\FormRequest;

class PostDto implements DtoInterface
{

    private ?int $id;
    private string $title;
    private string $postConent;
    private string $createdBy;
    private string $image;
    public static function fromApiFormRequest(FormRequest $request): DtoInterface
    {
        // TODO: Implement fromApiFormRequest() method.
    }

    public static function fromModel(Model $model): DtoInterface
    {
        // TODO: Implement fromModel() method.
    }

    public static function toArray(Model $model): array
    {
        // TODO: Implement toArray() method.
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
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

    public function getImage(): string
    {
        return $this->image;
    }

    public function setImage(string $image): void
    {
        $this->image = $image;
    }
}
