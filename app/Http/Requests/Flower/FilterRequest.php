<?php

namespace App\Http\Requests\Flower;

use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
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
            'title' => 'string',
            'description' => 'string',
            'category_id' => 'integer',
            'tag_id' => 'integer',
            'page' => 'integer',
            'per_page' => 'integer',
            'price_from' => 'integer',
            'price_to' => 'integer',
        ];
    }
}
