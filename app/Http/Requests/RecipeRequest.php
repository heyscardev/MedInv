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
        return [
            'recipe_type'   => ['sometimes','required', 'in:DAILY,MASSIVE,HIGH COST' ],
            'patient_id'    => ['sometimes','required', 'numeric', 'exists:patients,id'],
            'doctor_id'     => ['sometimes','required', 'numeric', 'exists:doctors,id'],
            'pathology_id'  => ['sometimes','required', 'numeric', 'exists:pathologies,id'],
            'module_id'     => ['sometimes','required', 'numeric', 'exists:modules,id'],
            'user_id'       => ['sometimes','required', 'numeric', 'exists:users,id'],
        ];
    }
}
