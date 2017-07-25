<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileUpdateRequest extends FormRequest
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
            'sex' => 'required',
            'birthday' => 'required',
            'address' => 'required',
        ];
    }

    public function messages() {
        return [
            'name.required' => 'Name không được bỏ trống',
            'name.max' => 'Name không quá 255 ký tự',
            'sex.required' => 'Giới tính không được bỏ trống',
            'birthday.required' => 'Ngày sinh không được bỏ trống',
            'address.required' => 'Địa chỉ không được bỏ trống',
        ];
    }
}
