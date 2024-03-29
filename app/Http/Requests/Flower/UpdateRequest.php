<?php

namespace App\Http\Requests\Flower;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'title' => 'string|max:100|min:10',
            'description' => 'string|max:500|min:10',
            'price' => 'integer|min:1',
            'count' => 'integer|min:0',
            'category_id' => 'nullable|integer|exists:categories,id',
            'tags' => 'nullable|array',
            'tags.*' => 'integer|exists:tags,id',
            'images' => 'nullable|array',
            'is_published' => 'nullable|boolean',
            'images.*' => 'image'
        ];
    }
}
