<?php

namespace App\Http\Requests;

use App\Models\Buy;
use App\Models\Module;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ModuleBuyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
      /*   $module = $this->route('module');
        if ($module->user_id === auth()->user()->id) return true; */
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->routeIs('buy.create')) return $this->createRules();
        if ($this->routeIs('buy.update')) return $this->editeRules();
        if ($this->routeIs('buy.store')) return $this->storeRules();
        return [];
    }

    private function createRules()
    {
        return [
           'search'=>['string','nullable']
        ];
    }
    private function storeRules()
    {
        return [
            'module_id'=>'required|integer|exists:modules,id',
            'description' => 'max:250',
            'medicaments' => 'required|array',
            'medicaments.*.id' => 'required|distinct:strict|exists:medicaments',
            'medicaments.*.price' => 'required|numeric|between:1,99999999999.99',
            'medicaments.*.quantity' => ['required','integer','min:1','max:1000000000',function ($attribute, $value, $fail) {
                $index = explode('.', $attribute)[1];
                $quantity = $this->input("medicaments.{$index}.quantity", null);
                $medicament_id = $this->input("medicaments.{$index}.id", null);
                $module = Module::find($this->input('module_id'));
                $medicament = $module->medicaments()->where('medicament_id',$medicament_id)->first();
                if(isset($medicament->pivot) && ($medicament->pivot->quantity_exist + $quantity)>2000000000) $fail("Al comprar {$medicament->name} excede el maximo por modulo (2.000.000.000). Maximo de compra ".(2000000000 -$medicament->pivot->quantity_exist));

            }],
        ];
    }
    private function editeRules()
    {
        return [
            'module_id'=>'sometimes|required|integer|exists:modules,id',
            'description' => 'sometimes|max:250',
            'medicaments' => 'sometimes|required|array',
            'medicaments.*.id' => 'required|distinct:strict|exists:medicaments',
            'medicaments.*.price' => 'required|numeric|between:1,99999999999.99',
            'medicaments.*.quantity' => ['required','integer','min:1','max:1000000000',function ($attribute, $value, $fail) {
                $index = explode('.', $attribute)[1];
                $buy = Buy::find($this->post('id'));
                $quantity = $this->input("medicaments.{$index}.quantity", null);
                $medicament_id = $this->input("medicaments.{$index}.id", null);
                $module = Module::find($this->input('module_id',$buy->module_id));
                $medicament = $module->medicaments()->where('medicament_id',$medicament_id)->first();
                if(isset($medicament->pivot) && ($medicament->pivot->quantity_exist + $quantity)>2000000000) $fail("Al comprar {$medicament->name} excede el maximo por modulo (2.000.000.000). Maximo de compra ".(2000000000 -$medicament->pivot->quantity_exist));

            }],
        ];
    }


}
