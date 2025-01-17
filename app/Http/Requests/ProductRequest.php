<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required',
            'quantity'=>'required',
            'brand_id'=>'required|exists:brands,id',
            'status'=>'required',
            'image'=>'nullable|image|mimes:png,jpg,jpeg|max:2000',


        ];
    }
}
