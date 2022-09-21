<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicamentRequest extends FormRequest
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
        'code'=>'required|unique:medicaments|max:25',
        'name'=>'required|max:100',
        'price_sale'=>'required|numeric|min:0.00|max:99999999999.99',
        'unit_id'=>'required|integer|exists:units,id'
        ];
    }
}
