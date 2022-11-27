<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Doctor;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Patient;
use App\Models\Recipe;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RecipeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:recipe.index')->only(['index']);
        $this->middleware('can:recipe.store')->only(['store']);
        $this->middleware('can:recipe.destroy')->only(['destroy']);
        $this->middleware('can:recipe.update')->only(['update']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = max(min($request->get('page_size'), 100), 10);
        $items = Recipe::paginate($paginate);
        return Inertia::render('Recipes/index', ['data' => $items]);
    }
    public function create(Request $request, Module $module)
    {

        $medicaments = [];
        $patients = [];
        $patientFind = $request->get('patients', null);
        $doctorsFind = $request->get('doctors', null);
        $doctors=[];
        $onlyChilds = $request->get('onlyChilds', null);
        if ($patientFind !== null) {
            $patients = Patient::where('c_i', "LIKE","%".$patientFind."%")
                ->orWhere('first_name', "LIKE","%".$patientFind."%")
                ->orWhere('last_name', "LIKE","%".$patientFind."%")
                ->orWhere('n_history', "LIKE","%".$patientFind."%")
                ->when($onlyChilds === true, function ($q) {
                    return $q->where('child', true);
                })->get();
        }
        if ($module->exists) {
            if (!auth()->user()->hasRole('administrador') && ($module->user_id != auth()->user()->id)) return abort(403);
            $medicaments = $module->medicaments()->with('unit')->get();
        }
        if ($doctorsFind !== null) {
            $doctors = Doctor::where('c_i', "LIKE","%".$doctorsFind."%")
                ->orWhere('first_name', "LIKE","%".$doctorsFind."%")
                ->orWhere('last_name', "LIKE","%".$doctorsFind."%")
                ->orWhere('code', "LIKE","%".$doctorsFind."%")
               ->get();
        }
        $moduleDeliver = $module->exists ? $module : null;
       
        $modules =  Module::with('user')
            ->when(!auth()->user()->hasRole('administrador'), function ($q) {
                return $q->where('user_id', auth()->user()->id);
            })
            ->get();


        return Inertia::render('Recipes/create', compact("doctors", "modules", "medicaments", "moduleDeliver", "patients"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RecipeRequest $request)
    {
        $validated = $request->validated();
        $recipe = new Recipe($validated);
        $recipe->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RecipeRequest $request, Recipe $recipe)
    {
        $validated = $request->validated();
        $recipe->update($validated);
        $recipe->save();
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        // with soft deletes
        $recipe->delete();
        return back();
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        // Restore soft deletes
        Recipe::withTrashed()->find($id)->restore();
        return back();
    }
}
