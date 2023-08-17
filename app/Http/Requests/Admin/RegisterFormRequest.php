<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RegisterFormRequest extends FormRequest
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
            'first_name' => 'required | alpha',
            'last_name' => 'required | alpha',
            'email' => 'required | email',
            'password' => 'required | min:6 | max:32',
            'confirm' => 'same:password',
        ];
    }

    public function messages() {
        return [
        'first_name.required' => 'Tên bắt buộc phải nhập!!',
        'first_name.alpha' => 'Tên bắt không được bao gồm số và ký tự đặc biệt!!',
        'last_name.required' => 'Họ và tên đệm bắt buộc phải nhập!!',
        'last_name.alpha' => 'Họ và tên đệm bắt không được bao gồm số và ký tự đặc biệt!!',
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
