<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Finance_calenders_Request extends FormRequest
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
            'FINANCE_YR' => 'required|unique:finance_calelanders',
            'FINANCE_YR_DESC' => 'required',
            //
        ];
    }

        public function messages():array {
        return[
      'FINANCE_YR.required'=>'الكود مطلوب',
            'FINANCE_YR.unique'=>'الكود موجود'   ,
             'FINANCE_YR_DESC.required'=>'الوصف مطلوب'

        ] ;
    }

}
