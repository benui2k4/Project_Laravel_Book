<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryUpdateRequest extends FormRequest
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
            'name' => 'required|unique:categories'.$this->id
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Danh mục không được để trống. Vui lòng điền tên danh mục.',
            'name.unique' => 'Danh mục đã tồn tại hãy thử đặt tên danh mục khác.',

        ];
    }

}
