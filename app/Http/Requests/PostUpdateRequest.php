<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostUpdateRequest extends FormRequest
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
            'title' => 'required|max:255',
            'cate_id' => 'required',
        ];
    }

    public function messages() {
        return [
            'title.required' => 'Tiêu đề không được bỏ trống',
            'title.max' => 'Tiêu đề không quá 255 ký tự',
            'cate_id.required' => 'Cần chọn danh mục',
        ];
    }
}
