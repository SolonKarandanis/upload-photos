<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
{
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
            'post_content'=>$this->post_content,
            'slug'=>$this->slug,
            'categories'=> $this->categories->map(fn($category) => new CategoryResource($category),true),
            'image' => url(Storage::url($this->image)),
            'updated_at'=>$this->updated_at,
            'created_at'=>$this->created_at
        ];
    }
}
