<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_ar'=>'required',
            'name_en'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'telephone'=>'required',
            'tax_number'=>'required',
            'address'=>'required',
            'address2'=>'required',
            'logo'=>'nullable|image|mimes:png,jpg,jpeg|max:2000',
        ];
    }
}
