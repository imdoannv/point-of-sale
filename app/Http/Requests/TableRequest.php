<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TableRequest extends FormRequest
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
            'name' => 'required|min:1|unique:tables,name,'. $this->id,
            'capacity' => 'required|integer|min:1|max:10',
        ];
    }

    public function messages(): array
    {
        return [
            // name
            "name.required" => "Tên không được để trống",
            "name.min" => "Số kí tự phải lớn hơn 1",
            "name.unique" => "Tên danh mục không được trùng",

            'capacity.required' => 'Số lượng người trên bàn phải bắt buộc nhập',
            'capacity.integer' => 'Số lượng người trên bàn phải là số',
            'capacity.min' => 'Số lượng người trên bàn phải từ :min kí tự trở lên',
            'capacity.max' => 'Số lượng người trên bàn phải từ :max kí tự trở xuống',
        ];
    }
}
