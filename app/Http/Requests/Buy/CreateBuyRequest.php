<?php

namespace App\Http\Requests\Buy;

use App\Models\Module;
use Illuminate\Foundation\Http\FormRequest;

class CreateBuyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
   /*      $moduleId = $this->route('id');
        $item = Module::find($moduleId);
        if (!isset($item)) return abort('404');
        if ($item->user->id === auth()->user()->id) return true; */
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
            'module_id'=>'required|integer|exists:modules,id',
            'description'=>'max:250',
            'medicaments'=>'required|array',
            'medicaments.*.id' => 'required|distinct:strict',
            'medicaments.*.price' => 'required|numeric|between:0,99999999999,99',
            'medicaments.*.quantity' => 'required|integer|min:0',
        ];

    }
}
