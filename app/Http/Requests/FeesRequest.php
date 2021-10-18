<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeesRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'fees_name' => 'required|max:250',
            'fees_value' => 'required|integer',
            'service_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'fees_name.required' => 'إسم الرسم مطلوب',
            'fees_value.required' => 'قيمة الرسم مطلوبة',
            'fees_value.integer' => 'ادخل رقم فقط من غير حروف',
            'service_id.required' => 'إسم الخدمة مطلوب'
        ];
    }
}
