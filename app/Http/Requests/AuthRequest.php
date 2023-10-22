<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return True;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'email' =>'required',
            'password' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'email.required' =>'Xin vui lòng nhập email',
            'password.required' =>'Xin vui lòng nhập password',
        ];
    }
}
