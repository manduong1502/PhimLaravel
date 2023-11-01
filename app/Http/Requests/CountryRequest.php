<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
            'title' => 'required|unique:countries|max:50',
            'slug' => 'required',
            'status' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'Vui lòng nhập tên quốc gia',
            'slug.required' =>'Vui lòng nhập link quốc gia',
            'status.required' =>'Vui lòng chọn hiển thị',
            'title.unique' =>'Tên quốc gia đã tồn tại',
            'title.max' =>'Tên quốc gia không quá 50 ký tự',
        ];
    }
}
