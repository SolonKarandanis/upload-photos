<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdatePostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:250', Rule::unique('posts', 'title')->ignore($this->postId)],
            'post_content' => ['required', 'string'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'categories' => ['required', 'array'],
            'categories.*' => ['required', 'integer', 'exists:categories,id'],
        ];
    }
}
