<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCreateRequest extends FormRequest
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
            'name' => 'required|unique:products',
            'category_id' =>'required',
            'author' => 'required',
            'price' => 'required',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp',
            'description' => 'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Sản phẩm không được để trống. Vui lòng điền tên sản phẩm.',
            'author.required' => 'Vui lòng điền tên tác giả.',
            'name.unique' => 'Sản phẩm đã tồn tại. Hãy thử đặt tên sản phẩm khác.',
            'category_id.required' => 'Vui lòng chọn danh mục.',
            'price.required' => 'Giá sản phẩm không được để trống. Vui lòng điền giá sản phẩm.',
            'file.required' => 'Ảnh của sản phẩm không được để trống. Vui lòng nhập ảnh của sản phẩm.',
            'description.required' => 'Nhận xét của sản phẩm không được để trống. Vui lòng điền nhận xét của sản phẩm.'
        ];
    }
}
