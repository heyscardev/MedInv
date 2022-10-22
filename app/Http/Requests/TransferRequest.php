<?php

namespace App\Http\Requests;

use App\Models\Medicament;
use App\Models\Module;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class TransferRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $module = $this->route('module', null);
        if ($module && $module->user_id !== auth()->user()->id) return false;
        if ($this->routeIs('transfer.store')) return $this->storeAuthorize();
        if ($this->routeIs('transfer.index')) return $this->indexAuthorize();
        return true;
    }
    private function storeAuthorize()
    {
        $module = Module::find($this->post('module_send_id', null));
        if ($module && $module->user_id !== auth()->user()->id) return false;
        return true;
    }
    private function indexAuthorize()
    {
        $module = Module::find($this->get('module', null));
        if ($module && $module->user_id !== auth()->user()->id) return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->routeIs('transfer.create')) return $this->createRules();
        if ($this->routeIs('transfer.store')) return $this->storeRules();
        if ($this->routeIs('transfer.index')) return $this->indexRules();
        return [
            //
        ];
    }

    private function indexRules()
    {
        $validColumns = ['id','user.first_name', 'module_send.name', 'module_receive.name','created_at'];
        return [
            'module' => ['numeric', 'exists:modules,id'],
            'page_size'=>['integer','in:10,20,50,100'],
            'orderBy' => ['array'],
            'orderBy.*.id' => ['required',Rule::in($validColumns)],
            'orderBy.*.desc' => ['required','boolean'],
            'filters'=>['array'],
            'filters.*.id'=>['required',Rule::in($validColumns)],
            'filters.*.value'=>['required','nullable'],
        ];
    }
    private function createRules()
    {
        return [
            //'searchMedicaments' => ['string', 'nullable'],
            'selected_medicaments' => ['array'],
            'selected_medicaments.*' => ['required', 'distinct', Rule::exists('medicament_module', 'medicament_id')->where(function ($query) {
                return $query->where('module_id', $this->route("module")->id);
            })]
        ];
    }
    private function storeRules()
    {
        return [
            'module_send_id' => ['required', 'exists:modules,id',],
            'module_receive_id' => ['required', 'exists:modules,id', "different:module_send_id"],
            'description' => ['string', 'nullable', 'max:250'],
            'medicaments' => ['required', 'array', 'min:1'],
            'medicaments.*.id' => ['required', 'distinct', Rule::exists('medicament_module', 'medicament_id')->where(function ($query) {
                return $query->where('module_id', $this->post("module_send_id"));
            })],
            'medicaments.*.quantity' => ['required', 'integer', "min:1", function ($attribute, $value, $fail) {
                $index = explode('.', $attribute)[1];
                $prefix = $this->input("medicaments.{$index}.id", null);
                $module_send_id = $this->input("module_send_id", null);
                $itemInventory = DB::table('medicament_module')->where("module_id", $module_send_id)->where("medicament_id", $prefix)->first();

                if ($itemInventory && $itemInventory->quantity_exist < $value) $fail("{$attribute} no puede exceder el inventario del modulo");
            }],

        ];
    }
}
