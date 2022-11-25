<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Doctor;
use App\Models\Module;
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
    public function create(Request $request)
    {
        $doctorFind = $request->get('doctors', "");
        $doctors = Doctor::where('first_name', "%" . $doctorFind . "%")
            ->orWhere('c_i', "LIKE", "%" . $doctorFind . "%")
            ->orWhere('last_name', "LIKE", "%" . $doctorFind . "%")
            ->orWhere('email', "LIKE", "%" . $doctorFind . "%")
            ->orWhere('id', $doctorFind)
            ->get();

        $moduleFind = $request->get('module', "");
        $modules =  Module::with('user')
            ->when(!auth()->user()->hasRole('administrador'), function ($q) {
                return $q->where('user_id', auth()->user()->id);
            })
            ->where('name', 'LIKE', "%" . $moduleFind . "%")
            ->orWhere('id', $moduleFind)
            ->get();


        return Inertia::render('Recipes/create', compact("doctors", "modules"));
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
