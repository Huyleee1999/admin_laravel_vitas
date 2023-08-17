<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TopicsFormRequest extends FormRequest
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
            'topics-name' => 'required | string',
            'topics-icon' => 'nullable | string',
            'topics-description' => 'required',
            'profession_id' => 'required | integer',
            'status' => 'required | boolean',
            'slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'topics-name.required' => 'Tên topic bắt buộc phải nhập!!',
        'topics-name.string' => 'Tên topic phải là chuỗi kí tự chữ!!',
        'topics-icon.string' => 'Tên icon phải là chuỗi kí tự chữ!!',
        'topics-description.required' => 'Mô tả bắt buộc phải nhập!!',
        'profession_id.required' => 'Chuyên ngành bắt buộc phải nhập!!',
        'profession_id.integer' => 'Chuyên ngành phải là số',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!',
        'slug.required' => 'Slug bắt buộc phải nhập!!'
        ];
    }
}
