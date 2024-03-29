<?php

namespace App\Http\Requests\Product;

use App\Models\Flower;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
            'flower_id' => ['required','integer','exists:flowers,id,deleted_at,NULL', Rule::unique('products', 'flower_id')->where(function ($query) {
                return $query->where('basket_id', $this->user->basket_id);
            }) ],
            'count' => ['required', 'integer','min:1', 'max:'.(Flower::find($this->flower_id) ? Flower::find($this->flower_id)->count : $this->count)]
        ];
    }
}
