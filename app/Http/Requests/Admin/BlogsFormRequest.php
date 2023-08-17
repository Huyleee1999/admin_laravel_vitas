<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BlogsFormRequest extends FormRequest
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
            'blog-name' => 'required | string',
            'blog-description' => 'required',
            'blog-content' => 'required',
            'profession_id' => 'required',
            'expert_id' => 'required',
            'status' => 'required | boolean',
            'is_highlight' => 'required | boolean',
            'type' => 'required',
            'slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'blog-name.required' => 'Blog bắt buộc phải nhập!!',
        'blog-name.string' => 'Blog phải là chuỗi kí tự chữ!!',
        'blog-description.required' => 'Mô tả bắt buộc phải nhập!!',
        'blog-content.required' => 'Nội dung bắt buộc phải nhập!!',
        'profession_id.required' => 'Chuyên ngành bắt buộc phải nhập!!',
        'expert_id.required' => 'Chuyên ngành bắt buộc phải nhập!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!',
        'is_highlight.required' => 'Hiển thị không được để trống!!',
        'is_highlight.boolean' => 'Hiển thị không hợp lệ!!',
        'type.required' => 'Type không được để trống!!',
        'slug.required' => 'Slug bắt buộc phải nhập!!'
        ];
    }
}
