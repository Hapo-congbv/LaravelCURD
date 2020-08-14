<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersRequestUpdate extends FormRequest
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
            'user_name'         => 'required|string|min:4|max:32',
            'full_name'         => 'required|string|min:4|max:50',
            'mobile'            => 'required',
            'email'             => 'required|email',
            'user_image'        => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'password'          => 'required|min:8'
        ];
    }


    public function messages()
    {
        return [
            'user_name.required'    => 'Vui lòng nhập tên !!',
            'mobile.required'       => 'Vui lòng nhập số điện thoại !!',
            'email.required'        => 'Vui lòng nhập email !!',
            'full_name.required'    => 'Full name không được để trống !!',
            'password.required'     => 'Vui lòng nhập password !!',
            'password.min'          => 'Password phải chứa ít nhất 8 ký tự !!'
        ];
    }
}
