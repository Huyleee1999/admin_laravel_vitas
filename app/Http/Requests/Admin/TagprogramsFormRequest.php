<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class TagprogramsFormRequest extends FormRequest
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
            'tag_id' => 'required',
            'program_id' => 'required'
        ];
    }

    public function messages() {
        return [
            'tag_id.required' => 'Tên thẻ bắt buộc phải nhập!!',
            'program_id.required' => 'Chương trình bắt buộc phải nhập!!',
        ];
    }
}
