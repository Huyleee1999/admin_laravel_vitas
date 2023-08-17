<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagsFormRequest extends FormRequest
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
            'tags-name' => 'required | string | max:200',
            'status' => 'required | boolean'
        ];
    }

    public function messages() {
        return [
        'tags-name.required' => 'Tag bắt buộc phải nhập!!',
        'tags-name.string' => 'Tag không có kí tự đặc biệt!!',
        'tags-name.max' => 'Tag không quá 200 kí tự!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!'
        ];
    }
}
