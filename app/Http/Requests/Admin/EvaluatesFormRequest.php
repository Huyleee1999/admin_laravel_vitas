<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EvaluatesFormRequest extends FormRequest
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
            'evaluates-rate' => 'required | integer',
            'evaluates-content' => 'required',
            'user_id' => 'required',
            'expert_id' => 'required',
            'status' => 'required | boolean'
        ];
    }

    public function messages() {
        return [
        'evaluates-rate.required' => 'Đánh giá buộc phải nhập!!',
        'evaluates-rate.integer' => 'Đánh giá phải là số!!',
        'evaluates-content.required' => 'Nội dung đánh giá buộc phải nhập!!',
        'user_id.required' => 'Người đánh giá bắt buộc phải chọn!!',
        'expert_id.required' => 'Chuyên gia bắt buộc phải chọn!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!'
        ];
    }
}
