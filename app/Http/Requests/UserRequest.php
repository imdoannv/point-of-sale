<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
            'name' => 'required|min:5',
            'email' => 'required|min:5|unique:users,email,' . $this->id,
            'password' => ['required', 'string','regex:/^(?=.*[A-Z])(?=.*\d).+$/', 'min:6', 'max:35'],
        ];

    }

    public function messages(): array
    {
        return [
            'name.required' => 'Vui lòng nhập tên.',
            'name.min' => 'Tên phải có ít nhất 5 ký tự.',

            'email.required' => 'Vui lòng nhập địa chỉ email.',
            'email.min' => 'Địa chỉ email phải có ít nhất 5 ký tự.',
            'email.unique' => 'Địa chỉ email này đã được sử dụng.',

            'password.required' => 'Trường mật khẩu là bắt buộc.',
            'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái viết hoa và ít nhất một số.',
            'password.string' => 'Mật khẩu phải là một chuỗi ký tự.',
            'password.min' => 'Mật khẩu phải có ít nhất :min ký tự.',
            'password.max' => 'Mật khẩu không được vượt quá :max ký tự.',
            'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
        ];
    }
}
