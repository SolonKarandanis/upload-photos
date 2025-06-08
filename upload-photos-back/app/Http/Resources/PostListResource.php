<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostListResource extends JsonResource
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
            'categories'=> $this->categories->map(fn($category) => CategoryResource::make($this->whenLoaded('categories')),true),
            'slug'=>$this->slug,
            'image' => url(Storage::url($this->image)),
        ];
    }
}
