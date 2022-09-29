<?php

namespace App\Http\Requests;

use App\Models\Module;
use Illuminate\Foundation\Http\FormRequest;

class ModuleBuyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $module = $this->route('module');
        if ($module->user->id === auth()->user()->id) return true;
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() == 'POST') return $this->storeRules();
        return [];
    }
    private function storeRules()
    {
        return [
            'description' => 'max:250',
            'medicaments' => 'required|array',
            'medicaments.*.id' => 'required|distinct:strict',
            'medicaments.*.price' => 'required|numeric|between:0,99999999999,99',
            'medicaments.*.quantity' => 'required|integer|min:0',
        ];
    }
}
