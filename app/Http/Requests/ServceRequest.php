<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServceRequest extends FormRequest
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
            'service_name' => 'required|max:250',
            'description' => 'required',
            'unit_id' => 'required',
            'unit' => 'required',
            'department_id' => 'required',
            'service' => 'required',
            'service_id' => 'required',
            'state' => 'required',
            'department' => 'required',
            'provider_ids' => 'required',
            'site_ids' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'service_name.required' => 'إسم الخدمة مطلوب',
            'description.required' => 'وصف الخدمة مطلوب',
            'unit_id.required' => 'إسم الوحدة مطلوب',
            'department_id.required' => 'إسم الادارة مطلوب',
            'service.required' => 'إسم الخدمة مطلوب',
            'service_id.required' => 'إسم الخدمة مطلوب',
            'state.required' => 'إسم الولاية مطلوب',
            'unit.required' => 'إسم الوحدة مطلوب',
            'department.required' => 'إسم الادارة مطلوب',
            'provider_ids.required' => 'إسم مقدم الخدمة مطلوب',
            'site_ids.required' => 'إسم موقع تقديم الخدمة مطلوب',
        ];
    }
}
