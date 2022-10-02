<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModuleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $module = $this->route('module');
        if ($module->user->id !== auth()->user()->id) return abort(403);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $module = $this->route('module');
        if ($this->url() === route('module.show', $module->id)) return $this->showRules();
        return [
            //
        ];
    }
    protected function showRules()
    {
        return [
            'orderBy' => ['array'],
            'orderBy.*.id' => ['required',Rule::in(['id','code', 'name', 'price_sale', 'unit.name','pivot.quantity_exist', 'pivot.created_at', 'pivot.updated_at','quantity_global'])],
            'orderBy.*.desc' => ['required','boolean'],
            'filters'=>['array'],
            'filters.*.id'=>['required',Rule::in(['id','code', 'name', 'price_sale', 'unit.name','pivot.quantity_exist', 'pivot.created_at', 'pivot.updated_at'])],
            'filters.*.value'=>['required','nullable']
        ];
    }

}
