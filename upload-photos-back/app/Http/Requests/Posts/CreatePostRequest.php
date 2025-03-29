<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title'=>['required','string','max:50'],
            'post_content'=>['required','string'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'categories'=>['required','array'],
            'categories.*'=>['required','integer','exists:categories,id'],
        ];
    }
}
