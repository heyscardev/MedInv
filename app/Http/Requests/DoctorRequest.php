<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class DoctorRequest extends FormRequest
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
        if ($this->routeIs('doctor.store')) return $this->store();
        if ($this->routeIs('doctor.update')) return $this->update();
        return [
            //
        ];
    }

    protected function storeRules()
    {
        return [
            'code'          => ['required', 'max:30','unique:doctors'],
            'nationality'   => ['required', 'in:V,E'],
            'c_i'           => ['required', 'numeric', 'digits_between:0,8', 'unique:doctors'],
            'code'           => ['required', 'max:30', 'unique:doctors'],
            'first_name'    => ['required', 'alpha', 'max:80'],
            'last_name'     => ['required', 'alpha', 'max:80'],
            'birth_date'    => ['required', 'date_format:Y-m-d', 'after:' . $this->nowMinus150years, 'before:' . $this->yesterday],
            'gender'        => ['required', 'in:Male,Female'],
            'email'         => ['required', 'email', 'max:255', 'unique:doctors'],
            'phone'         => ['nullable', 'max:25'],
            'direction'     => ['nullable', 'max:250'],
        ];
    }

    protected function updateRules()
    {
        return [
            'id'            => ['sometimes','required', 'integer', 'exists:doctors'],
            'code'          => ['sometimes','required', 'max:30', Rule::unique('doctors')->ignore($this->id) ],
            'nationality'   => ['sometimes','required', 'in:V,E'],
            'c_i'           => ['sometimes','numeric', 'digits_between:0,8', Rule::unique('doctors')->ignore($this->id) ],
            'first_name'    => ['sometimes','alpha', 'max:80'],
            'last_name'     => ['sometimes','alpha', 'max:80'],
            'birth_date'    => ['sometimes','date_format:Y-m-d', 'after:' . $this->nowMinus150years, 'before:' . $this->yesterday ],
            'gender'        => ['sometimes','in:Male,Female'],
            'email'         => ['sometimes','email', 'max:255', Rule::unique('doctors')->ignore($this->id)],
            'phone'         => ['sometimes','nullable', 'max:25'],
            'direction'     => ['sometimes','nullable', 'max:250'],
        ];
    }
}
