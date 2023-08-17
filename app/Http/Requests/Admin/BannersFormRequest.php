<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BannersFormRequest extends FormRequest
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
            'banner-title' => 'required | string',
            'banner-description' => 'required',
            'banner-slug' => 'required | string',
            // 'banner-image' => 'required | mimes:jpeg,jpg,png',
            'status' => 'required | boolean',
            'type' => 'required',
            // 'slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'banner-title.required' => 'Tiêu đề banner bắt buộc phải nhập!!',
        'banner-title.string' => 'Tiêu đề banner không có kí tự đặc biệt!!',
        'banner-description.required' => 'Mô tả banner bắt buộc phải nhập!!',
        'banner-slug.required' => 'Slug của banner bắt buộc phải nhập!!',
        // 'banner-image.required' => 'Hình banner bắt buộc phải nhập!!',
        // 'banner-image.mimes' => 'Hình mô tả phải thuộc định dạng jpeg, jpg, png!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!',
        'type.required' => 'Bắt buộc phải nhập!!',
        // 'slug.required' => 'Slug bắt buộc phải nhập!!',
        ];
    }
}
