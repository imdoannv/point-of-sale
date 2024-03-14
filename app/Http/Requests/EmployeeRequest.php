<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'phone' => 'required|regex:/^[0-9]{9,}$/|max:12|min:9|unique:employees,phone,' . $this->id,
            'salary' => 'required|integer|min:0',
            'timekeeping' => 'required|integer|min:0',
        ];
    }

    public function messages(): array
    {
        return [

            'salary.required' => 'Vui lòng nhập lương.',
            'salary.integer' => 'Vui lòng nhập lương.',
            'salary.min' => 'Phải từ 0 trờ lên',

            'timekeeping.required' => 'Vui lòng nhập số công.',
            'timekeeping.integer' => 'Vui lòng nhập lương.',
            'timekeeping.min' => 'Phải từ 0 trờ lên',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.max' => 'Số điện thoại không được quá 12 ký tự.',
            'phone.min' => 'Số điện thoại phải có ít nhất 9 ký tự.',
            'phone.unique' => 'Số điện thoại này đã được sử dụng.',
        ];
    }
}
