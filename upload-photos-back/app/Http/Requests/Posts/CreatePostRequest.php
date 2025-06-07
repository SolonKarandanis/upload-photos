<?php

namespace App\Http\Requests\Posts;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreatePostRequest extends FormRequest
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
            'title'=>['required','string','max:250'],
            'postContent'=>['required','string'],
            'image' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,avif'],
            'categories.*'=>['required','integer','exists:categories,id'],
        ];
    }

    public function validated($key = null, $default = null)
    {
        return array_merge(parent::validated(), [
            'created_by' => Auth::user()->id,
        ]);
    }

}
