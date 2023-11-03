<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EpisodeRequest extends FormRequest
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
            'movie_id' => 'required',
            'linkphim' =>'required',
            'episode' =>'required',
        ];
    }

    public function messages()
    {
        return [
            'movie_id.required' =>'Vui lòng chọn phim',
            'linkphim.required' =>'Vui lòng nhập link phim',
            'episode.required' =>'Vui lòng nhập tập phim', 
        ];
    }
}
