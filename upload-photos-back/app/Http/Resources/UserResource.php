<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'name'=>$this->name,
            'email'=>$this->email,
            'createdAt'=>$this->created_at,
            'updatedAt'=>$this->updated_at,
            'phoneNumber'=> $this->phone_number,
            'pin'=>$this->pin
        ];
    }
}
