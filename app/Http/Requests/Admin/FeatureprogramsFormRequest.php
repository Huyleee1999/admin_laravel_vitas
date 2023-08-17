<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class FeatureprogramsFormRequest extends FormRequest
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
            'featureprograms-name' => 'required | max:200',
            'featureprograms-description' => 'required',
            'featureprograms-content' => 'required',
            'profession_id' => 'required | integer',
            'is_highlight' => 'required | boolean',
            'status' => 'required | boolean',
            'featureprograms-slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'featureprograms-name.required' => 'Tính năng bắt buộc phải nhập!!',
        'featureprograms-name.max' => 'Tính năng không quá 200 kí tự!!',
        'featureprograms-description.required' => 'Mô tả bắt buộc phải nhập!!',
        'featureprograms-content.required' => 'Nội dung bắt buộc phải nhập!!',
        'profession_id.required' => 'Chuyên ngành bắt buộc phải nhập!!',
        'profession_id.integer' => 'Chuyên ngành phải là số',
        'is_highlight.required' => 'Hiển thị không được để trống!!',
        'is_highlight.boolean' => 'Hiển thị không hợp lệ!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!',
        'featureprograms-slug.required' => 'Slug bắt buộc phải nhập!!'
        ];
    }
}
