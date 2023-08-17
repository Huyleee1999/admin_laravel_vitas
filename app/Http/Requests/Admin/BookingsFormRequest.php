<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class BookingsFormRequest extends FormRequest
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
            'bookings-name' => 'required | min:6 | max:100',
            'bookings-content' => 'required',
            'bookings-phone' => 'required | max:11',
            'expert_id' => 'required | integer',
            'bookings-time' => 'required',
            'bookings-date' => "required",
            'bookings-link' => 'url'
            // | date('Y-m-d')
            // | numeric
            
        ];
    }

    public function messages() {
        return [
        'bookings-name.required' => 'Tên người đặt hẹn bắt buộc phải nhập!!',
        'bookings-name.min' => 'Tên người đặt hẹn ít nhất phải có 6 kí tự!!',
        'bookings-name.max' => 'Tên người đặt hẹn không vượt quá kí tự tối đa!!',
        'bookings-content.required' => 'Nội dung người đặt hẹn bắt buộc phải nhập!!',
        'bookings-phone.required' => 'Số điện thoại người đặt hẹn bắt buộc phải nhập!!',
        // 'bookings-phone.numeric' => 'Số điện thoại người đặt hẹn phải là số!!',
        'bookings-phone.max' => 'Số điện thoại người đặt hẹn không vượt qua kí tự quy định!!',
        'bookings-time.required' => 'Thời gian đặt hẹn bắt buộc phải nhập!!',
        'bookings-date.required' => 'Ngày đặt hẹn bắt buộc phải nhập!!',
        // 'bookings-date.date' => 'Ngày đặt hẹn phải đúng định dạng!!',
        'expert_id.required' => 'Chuyên gia bắt buộc phải nhập!!',
        'expert_id.integer' => 'Chuyên gia phải là số',
        'bookings-link.url' => 'Định dạng đường dẫn không hợp lệ!!'
        ];
    }
}
