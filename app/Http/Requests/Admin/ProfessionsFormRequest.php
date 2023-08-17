<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProfessionsFormRequest extends FormRequest
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
            'professions-name' => 'required | string | max:200',
            'status' => 'required | boolean'
        ];
    }

    public function messages() {
        return [
        'professions-name.required' => 'Tên chuyên ngành bắt buộc phải nhập!!',
        'professions-name.string' => 'Tên chuyên ngành không có kí tự đặc biệt!!',
        'professions-name.max' => 'Tên chuyên ngành không quá 200 kí tự!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!'
        ];
    }
}
