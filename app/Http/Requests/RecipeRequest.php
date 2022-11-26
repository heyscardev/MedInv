<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
        if ($this->routeIs('recipe.store')) return $this->store();
        if ($this->routeIs('recipe.update')) return $this->update();

        return [];
    }

    /**
     * Get the validation rules that apply to the post request.
     *
     * @return array
     */
    public function store()
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
    public function update()
    {
        return [
            'recipe_type'   => ['sometimes','required', 'in:DAILY,MASSIVE,HIGH COST'],
            'patient_id'    => ['sometimes','required', 'numeric', 'exists:patients,id'],
            'doctor_id'     => ['sometimes','required', 'numeric', 'exists:doctors,id'],
            'pathology_id'  => ['sometimes','required', 'numeric', 'exists:pathologies,id'],
            'module_id'     => ['sometimes','required', 'numeric', 'exists:modules,id'],
            'user_id'       => ['sometimes','required', 'numeric', 'exists:users,id'],
        ];
    }
}
