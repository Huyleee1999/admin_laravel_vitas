<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserFormRequest extends FormRequest
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
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required | email',
            'password' => 'required | min:6 | max:32',
            'confirm' => 'same:password',
        ];
    }

    public function messages() {
        return [
        'name.required' => 'Họ và tên bắt buộc phải nhập!!',
        'phone.required' => 'Số điện thoại bắt buộc phải nhập!!',
        'email.required' => 'Email bắt buộc phải nhập!!',
        // 'email.unique' => 'Bạn đã tạo tài khoản với email này rồi!!',
        'email.email' => 'Email phải đúng định dạng!!',
        'password.required' => 'Password bắt buộc phải nhập!!',
        'password.min' => 'Mật khẩu ít nhất phải có 6 kí tự!!',
        'password.max' => 'Mật khẩu không vượt quá 32 kí tự!!',
        'confirm.same' => 'Nhập lại mật khẩu không đúng!!'
        ];
    }
}
