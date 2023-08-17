<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CommentsFormRequest extends FormRequest
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
            'comments-content' => 'required',
            'forum_id' => 'required',
            'user_id' => 'required',
            'status' => 'required | boolean'
        ];
    }

    public function messages() {
        return [
        'comments-content.required' => 'Nội dung bình luận bắt buộc phải nhập!!',
        'forum_id.required' => 'Diễn đàn bắt buộc phải chọn!!',
        'user_id.required' => 'Người bình luận bắt buộc phải chọn!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!'
        ];
    }
}
