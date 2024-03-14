<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name' => 'required|min:5|unique:categories,name,'. $this->id,
            'image' => 'mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required|min:1|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            // name
            "name.required" => "Tên không được để trống",
            "name.min" => "Số kí tự phải lớn hơn 5",
            "name.unique" => "Tên danh mục không được trùng",

            // Description
            "description.required"=>"Mô tả không được để trống",
            "description.min"=>"Số kí tự phải lớn hơn 5",
            "description.max"=>"Số kí tự phải nhỏ hơn 255",

            'image.max' => 'Dung lượng file quá lớn',
            'image.mimes' => 'Hình ảnh phải có định dạng là jpeg, png, jpg hoặc gif.',
        ];
    }

}
