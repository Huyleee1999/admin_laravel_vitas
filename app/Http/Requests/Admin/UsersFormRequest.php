<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class UsersFormRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'users-name' => 'required | string | max:200 | min:6',
            'users-phone' => 'required | max: 11',
            'users-email' => 'required | email',
            'city_id' => 'required | integer',
            'slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'users-name.required' => 'Tên người dùng bắt buộc phải nhập!!',
        'users-name.string' => 'Tên người dùng không có kí tự đặc biệt!!',
        'users-name.max' => 'Tên người dùng không quá 200 kí tự!!',
        'users-name.min' => 'Tên người dùng phải có ít nhất 6 kí tự!!',
        'users-phone.required' => 'Số điện thoại bắt buộc phải nhập!!',
        'users-phone.max' => 'Số điện thoại không quá 11 số!!',
        'users-email.required' => 'Email bắt buộc phải nhập!!',
        'users-email.email' => 'Email phải đúng định dạng!!',
        'city_id.required' => 'Tỉnh thành không được để trống!!',
        'city_id' => 'Tỉnh thành phải là số!!',
        'slug.required' => 'Slug bắt buộc phải nhập!!',
        ];
    }
}
