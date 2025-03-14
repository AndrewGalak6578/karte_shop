<?php

namespace App\Http\Requests\Product;

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
            'title' => 'nullable|string',
            'description' => 'nullable|string',
            'content' => 'nullable|string',
            'preview_image' => 'nullable|string',
            'count' => 'nullable|integer',
            'price' => 'nullable|integer',
            'past_price' => 'nullable|integer',
            'is_published' => 'nullable|boolean',
            'category_id' => 'nullable|integer',
            'group_id' => 'nullable|integer',
            'tags' => 'nullable|array',
            'colors' => 'nullable|array',
            'sizes' => 'nullable|array',
        ];
    }
}
