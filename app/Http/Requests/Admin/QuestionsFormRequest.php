<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class QuestionsFormRequest extends FormRequest
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
            'questions-content' => 'required',
            'questions-answer' => 'required',
            'profession_id' => 'required | integer',
            'status' => 'required | boolean'
        ];
    }

    public function messages() {
        return [
        'questions-content.required' => 'Nội dung bắt buộc phải nhập!!',
        'questions-answer.required' => 'Câu trả lời bắt buộc phải nhập!!',
        'profession_id.required' => 'Chuyên ngành bắt buộc phải nhập!!',
        'profession_id.integer' => 'Chuyên ngành phải là số',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!'
        ];
    }
}
