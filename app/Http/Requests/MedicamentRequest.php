<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

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
        if ($this->routeIs('medicament.index')) return $this->indexRules();
        if ($this->routeIs('medicament.store')) return $this->storeRules();
        if ($this->routeIs('medicament.update')) return $this->updateRules();
        return [

        ];
    }
    protected function indexRules()
    {
        return [
            'orderBy'           => ['array'],
            'orderBy.*.id'      => ['required',Rule::in(['id','name', 'price_sale', 'unit.name','created_at','updated_at','quantity_global'])],
            'orderBy.*.desc'    => ['required','boolean'],
            'filters'           => ['array'],
            'filters.*.id'      => ['required',Rule::in(['id','name', 'price_sale', 'unit.name','created_at','updated_at'])],
            'filters.*.value'   => ['required','nullable'],
            'page_size'         => ['integer','in:10,20,50,100']
        ];
    }

    protected function storeRules()
    {
        return [
            'code'       =>'required|max:25|unique:medicaments',
            'name'       =>'required|max:100',
            'price_sale' =>'required|numeric|min:0.00|max:99999999999.99',
            'unit_id'    =>'required|integer|exists:units,id'
        ];
    }

    protected function updateRules()
    {
        return [
            'code'       =>'sometimes|required|max:25|unique:medicaments,id',
            'name'       =>'sometimes|required|max:100',
            'price_sale' =>'sometimes|required|numeric|min:0.00|max:99999999999.99',
            'unit_id'    =>'sometimes|required|integer|exists:units,id'
        ];
    }
}
