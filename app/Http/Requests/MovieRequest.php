<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MovieRequest extends FormRequest
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
                'title' => 'required|unique:movies|max:255',
                'description' =>'required',
                'slug' => 'required',
                'status' => 'required',
                'slide' =>'required',
                'phim_hot' =>'required',
                'country_id' =>'required',
                'genre_id' =>'required',
                'category_id' =>'required',
                'so_tap' => 'required|min:1',
                'actor' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'title.required' =>'Vui lòng nhập tên phim',
            'title.unique' =>'Tên phim đã tồn tại',
            'title.max' =>'Tên thể loại không quá 100 ký tự',
            'status.required' =>'Vui lòng chọn',
            'slug.required' =>'Vui lòng nhập link phim',
            'description.required' =>'Vui lòng nhập mô tả',
            'slide.required' =>'Vui lòng chọn',
            'country_id.required' =>'Vui lòng chọn quốc gia',
            'genre_id.required' =>'Vui lòng chọn thể loại',
            'category_id.required' =>'Vui lòng chọn danh mục',
            'so_tap.required' =>'Vui lòng nhập số tập',
            'actor.required' =>'Vui lòng nhập diễn viên',
            'phim_hot.required' =>'Vui lòng chọn',
        ];
    }
}
