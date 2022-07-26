<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use App\Rules\AlphaWithSpaces;

class PatientRequest extends FormRequest
{
    protected $yesterday, $nowMinus150years;

    public function __construct()
    {
        $this->yesterday        = date('Y-m-d', strtotime('1 days'));
        $this->nowMinus150years = date('Y-m-d', strtotime('-150 years'));
    }

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
        if ($this->routeIs('patient.index')) return $this->indexRules();
        if ($this->routeIs('patient.store')) return $this->storeRules();
        if ($this->routeIs('patient.update')) return $this->updateRules();
        return [
            //
        ];
    }

    protected function indexRules()
    {
        return [
            'orderBy'           => ['array'],
            'orderBy.*.id'      => ['required',Rule::in(['c_i','n_history', 'first_name', 'last_name', 'child','gender'])],
            'orderBy.*.desc'    => ['required','boolean'],
            'filters'           => ['array'],
            'filters.*.id'      => ['required',Rule::in(['c_i','n_history', 'first_name', 'last_name', 'child','gender'])],
            'filters.*.value'   => ['required','nullable'],
            'page_size'         => ['integer','in:10,20,50,100']
        ];
    }

    protected function storeRules()
    {
        return [
            'n_history'     => ['required', 'max:30','unique:patients'],
            'nationality'   => ['required', 'in:V,E'],
            'c_i'           => ['required', 'numeric', 'digits_between:0,8', Rule::unique('patients') ],
            'first_name'    => ['required', new AlphaWithSpaces, 'max:80'],
            'last_name'     => ['required', new AlphaWithSpaces, 'max:80'],
            'birth_date'    => ['required', 'date_format:Y-m-d', 'after:' . $this->nowMinus150years, 'before:' . $this->yesterday],
            'gender'        => ['required', 'in:Male,Female'],
            'child'         => ['required'],
            'email'         => ['required', 'email', 'max:255'],
            'phone'         => ['nullable', 'max:25'],
            'direction'     => ['nullable', 'max:250'],
        ];
    }

    protected function updateRules()
    {
        return [
            'id'            => ['sometimes','required', 'integer', 'exists:patients'],
            'n_history'     => ['sometimes','required', 'max:30', Rule::unique('patients')->ignore($this->id)],
            'nationality'   => ['sometimes','required', 'in:V,E'],
            'c_i'           => ['sometimes','numeric', 'digits_between:0,8', Rule::unique('patients')->ignore($this->id)],
            'first_name'    => ['sometimes',new AlphaWithSpaces, 'max:80'],
            'last_name'     => ['sometimes',new AlphaWithSpaces, 'max:80'],
            'birth_date'    => ['sometimes','date_format:Y-m-d', 'after:' . $this->nowMinus150years, 'before:' . $this->yesterday],
            'gender'        => ['sometimes','in:Male,Female'],
            'child'         => ['sometimes','required'],
            'email'         => ['sometimes','email', 'max:255', Rule::unique('patients')->ignore($this->id)],
            'phone'         => ['sometimes','nullable', 'max:25'],
            'direction'     => ['sometimes','nullable', 'max:250'],
        ];
    }
}
