<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_panel_settingRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
           'company_name'=>'required',
            'phones'=>'required',
            'email'=>'required',
            'address'=>'required',
            'after_miniute_calculate_delay'=>'required',
            'after_miniute_calculate_early_departure'=>'required',
            'after_miniute_quarterday'=>'required',
            'after_time_half_daycut'=>'required',
            'after_time_allday_daycut'=>'required',

        ];
    }
    public function messages()
    {
        return [
            'company_name.required'=>'اسم الشركة مطلوب'
        ];
    }
}
