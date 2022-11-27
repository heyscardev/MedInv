<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class RecipeRequest extends FormRequest
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
        if ($this->routeIs('recipe.index')) return $this->indexRules();
        if ($this->routeIs('recipe.store')) return $this->storeRules();
        if ($this->routeIs('recipe.update')) return $this->updateRules();

        return [];
    }

    /**
     * Get the validation rules that apply to the get request.
     *
     * @return array
     */
    protected function indexRules()
    {
        return [
            'orderBy'           => ['array'],
            'orderBy.*.id'      => ['required',Rule::in(['id','code', 'name', 'price_sale', 'unit.name','pivot.quantity_exist', 'pivot.created_at', 'pivot.updated_at','quantity_global'])],
            'orderBy.*.desc'    => ['required','boolean'],
            'filters'           => ['array'],
            'filters.*.id'      => ['required',Rule::in(['id','code', 'name', 'price_sale', 'unit.name','pivot.quantity_exist', 'pivot.created_at', 'pivot.updated_at'])],
            'filters.*.value'   => ['required','nullable'],
            'page_size'         => ['integer','in:10,20,50,100']
        ];
    }

    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function storeRules()
    {
        return [
            'recipe_type'   => ['required', 'in:DAILY,MASSIVE,HIGH COST'],
            'patient_id'    => ['required', 'numeric', 'exists:patients,id'],
            'doctor_id'     => ['required', 'numeric', 'exists:doctors,id'],
            'pathology_id'  => ['required', 'numeric', 'exists:pathologies,id'],
            'module_id'     => ['required', 'numeric', 'exists:modules,id'],
            'user_id'       => ['required', 'numeric', 'exists:users,id'],
        ];
    }

    /**
     * Get the validation rules that apply to the put/patch request.
     *
     * @return array
     */
    public function updateRules()
    {
        return [
            'recipe_type'   => ['sometimes','required', 'in:DAILY,MASSIVE,HIGH COST'],
            'patient_id'    => ['sometimes','required', 'numeric', 'exists:patients,id'],
            'doctor_id'     => ['sometimes','required', 'numeric', 'exists:doctors,id'],
            'pathology_id'  => ['sometimes','required', 'numeric', 'exists:pathologies,id'],
            'module_id'     => ['sometimes','required', 'numeric', 'exists:modules,id'],
            'user_id'       => ['sometimes','required', 'numeric', 'exists:users,id'],
        ];


        //Patalogia solo es requerida solo cuando el type es: HIGH COST
    }
}
