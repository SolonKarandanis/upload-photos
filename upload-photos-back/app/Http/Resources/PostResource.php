<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
{
    public static $wrap = false;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=>$this->id,
            'title'=>$this->title,
            'postContent'=>$this->post_content,
            'slug'=>$this->slug,
            'categories'=> $this->categories->map(fn($category) => new CategoryResource($category),true),
            'image' => url(Storage::url($this->image)),
            'updatedAt'=>$this->updated_at,
            'createdAt'=>$this->created_at
        ];
    }
}
