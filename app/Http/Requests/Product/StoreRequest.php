<?php

namespace App\Http\Requests\Product;

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
            'title' => 'required|string',
            'description' => 'required|string',
            'content' => 'required|string',
            'preview_image' => 'nullable|file',
            'count' => 'required|integer',
            'price' => 'required|integer',
            'past_price' => 'required|integer',
            'is_published' => 'nullable|boolean',
            'category_id' => 'nullable|integer',
            'group_id' => 'nullable|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
            'product_images' => 'nullable|array'
        ];
    }
}
