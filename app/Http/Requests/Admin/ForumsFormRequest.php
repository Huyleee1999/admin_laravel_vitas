<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ForumsFormRequest extends FormRequest
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
            'forums-name' => 'required',
            'forums-content' => 'required',
            'created_by' => 'required | integer',
            'topic_id' => 'required | integer',
            'is_highlight' => 'required | boolean',
            'status' => 'required | boolean',
            'slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'forums-name.required' => 'Diễn đàn bắt buộc phải nhập!!',
        'forums-content.required' => 'Nội dung diễn đàn bắt buộc phải nhập!!',
        'created_by.required' => 'Người tạo bắt buộc phải nhập!!',
        'created_by.integer' => 'Người tạo phải là số',
        'topic_id.required' => 'Chủ đề bắt buộc phải nhập!!',
        'topic_id.integer' => 'Chủ đề phải là số',
        'is_highlight.required' => 'Hiển thị không được để trống!!',
        'is_highlight.boolean' => 'Hiển thị không hợp lệ!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!',
        'slug.required' => 'Slug bắt buộc phải nhập'
        ];
    }
}
