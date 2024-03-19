<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Carbon\Carbon;

class DiscountRequest extends FormRequest
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
            'name' => 'required|min:5|unique:discounts,name,' . $this->id,
            'type' => 'required',
            'value' => 'required|integer',
            'quantity' => 'required|integer|min:1',
            'description' => 'required|min:1|max:255',
            'start_date' => 'required|date|after_or_equal:' . Carbon::now()->toDateTimeString(),
            'end_date' => ['required', 'after_or_equal:start_date',],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mã giảm giá phải bắt buộc nhập',
            'name.min' => 'Mã giảm giá phải từ :min kí tự trở lên',
            'name.unique' => 'Mã giảm giá đã tồn tại trên hệ thống',

            'type.required' => 'Kiểu không được để trống',

            'value.required' => 'Giá trị bắt buộc nhập',
            'value.integer' => 'Giá trị phải là số',

            "description.required"=>"Mô tả không được để trống",
            "description.min"=>"Số kí tự phải lớn hơn 0",
            "description.max"=>"Số kí tự phải nhỏ hơn 255",

            'quantity.required' => 'Số lượng phải bắt buộc nhập',
            'quantity.integer' => 'Số lượng phải là số',
            'quantity.min' => 'Mã giảm giá phải từ :min kí tự trở lên',

            'start_date.required' => 'Thời gian bắt đầu phải bắt buộc nhập',
            'start_date.after_or_equal' => 'Thời gian bắt đầu phải lớn hơn thời gian hiện tại',

            'end_date.required' => 'Thời gian kết thúc phải bắt buộc nhập',
            'end_date.after_or_equal' => 'Thời gian kết thúc phải lớn hơn thời gian bắt đầu',
        ];
    }
}
