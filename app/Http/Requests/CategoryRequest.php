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
        return [
            'title' => 'required|unique:categories|max:255',
            'slug' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'Vui lòng nhập Tên danh mục',
            'slug.required' =>'Vui lòng nhập link danh mục',
            'status.required' =>'Vui lòng chọn hiển thị',
            'title.unique' =>'Tên danh mục đã tồn tại',
            'title.max' =>'Tên danh mục không quá 255 ký tự',
        ];
    }
}
