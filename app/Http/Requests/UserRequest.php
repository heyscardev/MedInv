<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
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
        // return match( $this->method() )
        // {
        //     'POST' => $this->store(),
        //     'PUT', 'PATCH' => $this->update(),
        // };

        if ($this->routeIs('user.store')) return $this->store();
        if ($this->routeIs('user.update')) return $this->update();

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
            'nationality'   => ['required', 'in:V,E'],
            'c_i'           => ['required', 'numeric', 'digits_between:0,8', Rule::unique('users')->ignore($this->id) ],
            'first_name'    => ['required', 'alpha', 'max:80'],
            'last_name'     => ['required', 'alpha', 'max:80'],
            'birth_date'    => ['required', 'date_format:Y-m-d', 'after:' . $this->nowMinus150years, 'before:' . $this->yesterday],
            'gender'        => ['required', 'in:Male,Female'],
            'email'         => ['required',  'email', 'max:255', Rule::unique('users')->ignore($this->id) ],
            'phone'         => ['nullable', 'max:25'],
            'direction'     => ['nullable', 'max:250'],
            'state'         => ['nullable', 'boolean'],
            'password'      => ['required', 'confirmed', Rules\Password::defaults()]
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
            'id'            => ['required', 'integer', 'exists:users'],
            'nationality'   => ['sometimes','required', 'in:V,E'],
            'c_i'           => ['sometimes','required', 'numeric', 'digits_between:0,8', Rule::unique('users')->ignore($this->id) ],
            'first_name'    => ['sometimes','required', 'alpha', 'max:80'],
            'last_name'     => ['sometimes','required', 'alpha', 'max:80'],
            'birth_date'    => ['sometimes','required', 'date_format:Y-m-d', 'after:' . $this->nowMinus150years, 'before:' . $this->yesterday],
            'gender'        => ['sometimes','required', 'in:Male,Female'],
            'email'         => ['sometimes','required',  'email', 'max:255', Rule::unique('users')->ignore($this->id) ],
            'phone'         => ['sometimes','nullable', 'max:25'],
            'direction'     => ['sometimes','nullable', 'max:250'],
            'state'         => ['sometimes','nullable', 'boolean'],
            'password'      => ['sometimes','required', 'confirmed', Rules\Password::defaults()]
        ];
    }


    // /**
    //  * Set Messages.
    //  *
    //  * @return array
    //  */
    // public function messages()
    // {
    //     return [
    //         'email.unique' => 'El correo ya existe, revisar usuarios activos y borrados',
    //     ];
    // }

}
