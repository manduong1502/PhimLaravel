<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GenreRequest extends FormRequest
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
            'title' => 'required|unique:genre|max:100',
            'slug' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'Vui lòng nhập tên thể loại',
            'slug.required' =>'Vui lòng nhập link thể loại',
            'status.required' =>'Vui lòng chọn hiển thị',
            'title.unique' =>'Tên thể loại đã tồn tại',
            'title.max' =>'Tên thể loại không quá 100 ký tự',
        ];
    }
}
