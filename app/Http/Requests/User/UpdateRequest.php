<?php

namespace App\Http\Requests\User;

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
            'name' => 'string|min:2|max:255',
            'surname' => 'string|min:2|max:255',
            'age' => 'nullable|integer|min:1|max:150',
            'address' => 'nullable|string|min:5|max:255',
            'gender' => 'nullable|integer|max:1|min:0',
            'balance' => 'integer|min:0',
            'isAdmin' => 'boolean',
        ];
    }
}
