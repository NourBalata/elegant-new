<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DoctorRequest extends FormRequest
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
            'first_name'=>'required',
            'last_name'=>'required',
            'id_number'=>'required',
            'phone'=>'required',
            'password'=>'nullable|confirmed',
            'date_brith'=>'required',
            'gender'=>'required',
            'status'=>'required',
            'address'=>'required',
            'city_id'=>'required',
            'balance'=> "required_if:commission,==,0",
            'commission'=> "required_if:balance,==,0",
            'logo'=>'nullable|image|mimes:png,jpg,jpeg|max:2000',
            'graduation_certificate'=>'nullable|mimes:pdf|max:2000',
            'cv'=>'nullable|mimes:pdf|max:2000',
            'day.*'=>'required',

        ];
    }
}
