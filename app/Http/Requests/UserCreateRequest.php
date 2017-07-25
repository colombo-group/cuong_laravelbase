<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'username' => 'required|unique:users',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name không được bỏ trống',
            'name.max' => 'Name không quá 255 ký tự',
            'username.required' => 'Username không được bỏ trống',
            'username.unique' => 'Username đã tồn tại',
            'email.required' => 'Email không được bỏ trống',
            'email.email' => 'Email không đúng định dạng',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email không quá 255 ký tự',
            'password.required' => 'Password không được bỏ trống',
            'password.min' => 'Password ít nhất phải có 6 ký tự',
            'password.confirmed' => 'Nhập lại password chưa đúng',
        ];
    }
}
