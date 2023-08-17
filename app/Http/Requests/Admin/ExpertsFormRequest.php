<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ExpertsFormRequest extends FormRequest
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
            'experts-name' => 'required | string | max:200 | min:6',
            'experts-phone' => 'required | max: 11',
            'experts-email' => 'required | email',
            'experts-company' => 'required',
            'experts-description' => 'required',
            'experts-price' => ['required', 'regex:/[0-9]([0-9]|-(?!-))+/'],
            'experts-content' => 'required',
            'experts-experience' => 'required',
            'experts-position' => 'required',
            'experts-certificate' => 'required',
            'experts-project' => 'required',
            'is_highlight' => 'required | boolean',
            'status' => 'required | boolean',
            'slug' => 'required'
        ];
    }

    public function messages() {
        return [
        'experts-name.required' => 'Tên chuyên gia bắt buộc phải nhập!!',
        'experts-name.string' => 'Tên chuyên gia không có kí tự đặc biệt!!',
        'experts-name.max' => 'Tên chuyên gia không quá 200 kí tự!!',
        'experts-name.min' => 'Tên chuyên gia phải có ít nhất 6 kí tự!!',
        'experts-phone.required' => 'Số điện thoại bắt buộc phải nhập!!',
        'experts-phone.max' => 'Số điện thoại không quá 11 số!!',
        'experts-email.required' => 'Email bắt buộc phải nhập!!',
        'experts-email.email' => 'Email phải đúng định dạng!!',
        'experts-company.required' => 'Tên công ty bắt buộc phải nhập!!',
        'experts-description.required' => 'Mô tả bắt buộc phải nhập!!',
        'experts-price.required' => 'Giá bắt buộc phải nhập',
        'experts-price.regex' => 'Giá phải đúng định dạng',
        'experts-content.required' => 'Nội dung bắt buộc phải nhập!!',
        'experts-experience.required' => 'Kinh nghiệm bắt buộc phải nhập!!',
        'experts-position.required' => 'Vị trí bắt buộc phải nhập!!',
        'experts-certificate.required' => 'Thành tựu bắt buộc phải nhập!!',
        'experts-project.required' => 'Dự án bắt buộc phải nhập!!',
        'is_highlight.required' => 'Hiển thị không được để trống!!',
        'is_highlight.boolean' => 'Hiển thị không hợp lệ!!',
        'status.required' => 'Trạng thái không được để trống!!',
        'status.boolean' => 'Trạng thái không hợp lệ!!' ,
        'slug.required' => 'Slug bắt buộc phải nhập!!'
        ];
    }
}
