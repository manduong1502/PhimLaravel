<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRegisterRequest extends FormRequest
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
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed', 
        ];
    }

    public function messages()
    {
        return [
            'username.required' => 'Xin vui lòng nhập username',
            'email.required' =>'Xin vui lòng nhập email',
            'password.required' =>'Xin vui lòng nhập password',
            'password.confirmed' => 'Mật khẩu không khớp',
        ];
    }
}
