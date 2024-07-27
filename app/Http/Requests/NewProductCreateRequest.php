<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewProductCreateRequest extends FormRequest
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
            'name' => 'required|unique:newproducts',
            'author' => 'required',
            'file' => 'required|file|mimes:jpg,jpeg,png,gif,webp',
            'publication_date' => 'required',
            'category_id' =>'required'
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Tên sản phẩm mới không được để trống. Vui lòng điền tên sản phẩm.',
            'author.required' => ' Vui lòng điền tên tác giả .',
            'name.unique' => 'Sản phẩm đã tồn tại. Hãy thử đặt tên sản phẩm khác.',
            'file.required' => 'Ảnh của sản phẩm không được để trống. Vui lòng nhập ảnh của sản phẩm.',
            'file.file' => 'Vui lòng nhập đúng định dạng file ảnh.',
            'file.mimes' => 'Vui lòng nhập đúng định dạng kiểu file ảnh.',
            'publication_date.required' => 'Vui lòng nhập ngày xuất bản.',
            'category_id.required' => 'Vui lòng chọn danh mục.'
        ];
    }
}
