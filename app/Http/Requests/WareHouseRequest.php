<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class WareHouseRequest extends FormRequest
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
            'phone' => 'required|regex:/^[0-9]{9,}$/|max:12|min:9|unique:warehouses,phone,' . $this->id,
            'address' => 'required|min:1|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // name
            "name.required" => "Tên không được để trống",
            "name.min" => "Số kí tự phải lớn hơn 1",
            "name.unique" => "Tên danh mục không được trùng",

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.regex' => 'Số điện thoại không hợp lệ.',
            'phone.max' => 'Số điện thoại không được quá 12 ký tự.',
            'phone.min' => 'Số điện thoại phải có ít nhất 9 ký tự.',
            'phone.unique' => 'Số điện thoại này đã được sử dụng.',

            // address
            "address.required"=>"Mô tả không được để trống",
            "address.min"=>"Số kí tự phải lớn hơn 0",
            "address.max"=>"Số kí tự phải nhỏ hơn 255",
        ];
    }
}
