<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SalesOrderRequest extends FormRequest
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
            'patient_id'=>'required',
            'date'=>'required',
            'quantity'=>'required',
            'status_id'=>'required',
            'due_date'=>'required',
            'service.*'=>'required',
            'category.*'=>'required',
            'doctor.*'=>'required',
            'quantity.*'=>'required',
            'price.*'=>'required|numeric',
            'amount.*'=>'required|numeric',
            'discount.*'=>'required|numeric',
            'amount_discount.*'=>'required|numeric',
            'note'=>'nullable',
            'attachment'=>'nullable|mimes:png,jpg,jpeg,pdf|max:2000',

        ];
    }
}
