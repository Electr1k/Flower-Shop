<?php

namespace App\Http\Requests\Flower;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'title' => 'required|string|max:100|min:10',
            'description' => 'required|string|max:500|min:10',
            'price' => 'required|integer|min:1',
            'count' => 'required|integer|min:0',
            'category_id' => 'nullable|integer',
            'tags' => 'nullable|array',
            'images' => 'nullable|array',
            'is_publish' => 'nullable|boolean',
            'images.*' => 'image'
        ];
    }
}
