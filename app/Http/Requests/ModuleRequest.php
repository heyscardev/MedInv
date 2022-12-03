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
        // $module = $this->route('module');
        // if ($module->user->id !== auth()->user()->id) return abort(403);
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->routeIs('module.store')) return $this->storeRules();
        if ($this->routeIs('module.update')) return $this->updateRules();
        if ($this->routeIs('module.show')) return $this->showRules();
        return [
            //
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
            'code'    =>'required|max:25|unique:modules',
            'name'    =>'required|max:100',
            'user_id' =>'required|integer|exists:users,id'
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
            'code'  =>'sometimes|required|max:25|' . Rule::unique('modules')->ignore($this->id),
            'name'  =>'sometimes|required|max:100',
            'user_id' =>'sometimes|required|integer|exists:users,id'
        ];
    }


    protected function showRules()
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

}
