<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SupplierRequest extends FormRequest
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
            'phone'=>'required',
            'password'=>'nullable|confirmed',
            'status'=>'required',
            'address'=>'required',
            'city_id'=>'required',
            'logo'=>'nullable|image|mimes:png,jpg,jpeg|max:2000',
        ];
    }
}
