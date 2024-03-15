<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FloorRequest extends FormRequest
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
            'name' => 'required|min:1|unique:categories,name,'. $this->id,
            'quantity' => 'required|integer|min:1'
        ];
    }

    public function messages(): array
    {
        return [
            // name
            "name.required" => "Tên không được để trống",
            "name.min" => "Số kí tự phải lớn hơn 1",
            "name.unique" => "Tên danh mục không được trùng",

            'quantity.required' => 'Vui lòng nhập số bàn của tầng này.',
            'quantity.integer' => 'Vui lòng nhập số bàn.',
            'quantity.min' => 'Phải từ 1 bàn trờ lên'
        ];
    }
}
