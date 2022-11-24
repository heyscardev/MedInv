<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;

class UserRequest extends FormRequest
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

        $yesterday = date('Y-m-d', strtotime('1 days'));
        $nowMinus150years = date('Y-m-d', strtotime('-150 years'));
        return [
            'c_i' => ['sometimes','required', 'numeric', 'digits_between:0,8', Rule::unique('users')->ignore($this->id) ],
            'first_name' => ['sometimes','required', 'alpha', 'max:80'],
            'last_name' => ['sometimes','required', 'alpha', 'max:80'],
            'birth_date' => ['sometimes','required', 'date_format:Y-m-d', 'after:' . $nowMinus150years, 'before:' . $yesterday],
            'gender' => ['sometimes','required', 'in:Male,Female'],
            'email' => ['sometimes','required',  'email', 'max:255', Rule::unique('users')->ignore($this->id) ],
            'phone' => ['sometimes','nullable', 'max:25'],
            'direction' => ['sometimes','nullable', 'max:250'],
            'state' => ['sometimes','nullable', 'boolean'],
            'password' => ['sometimes','required', 'confirmed', Rules\Password::defaults()]
        ];
    }
}
