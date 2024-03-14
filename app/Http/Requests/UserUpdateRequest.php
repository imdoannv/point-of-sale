<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
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
        ];
    }
}
