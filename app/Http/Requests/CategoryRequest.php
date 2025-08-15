<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        $id = $this->route('category')?->id;
        return [
            'name' => 'required|string|max:100|unique:categories,name,' . ($id ?? 'NULL'),
            'slug' => 'nullable|string|max:120|unique:categories,slug,' . ($id ?? 'NULL'),
            'is_active' => 'sometimes|boolean',
        ];
    }
}
