<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DepartmentRequest extends FormRequest
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
            'department_name' => 'required|max:250',
            'unit_id' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'department_name.required' => 'إسم الادارة مطلوب',
            'unit_id.required' => 'إسم الوحدة مطلوب'
        ];
    }
}
