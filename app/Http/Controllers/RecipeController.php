<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecipeRequest;
use App\Models\Doctor;
use App\Models\Medicament;
use App\Models\Module;
use App\Models\Pathology;
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
    public function index(Request $request, Module $module)
    {
        $moduleDeliver = null;
        $paginate = max(min($request->get('page_size'), 100), 10);
        if ($module->exists) {
            $query = $module->recipes()->with(['patient', 'doctor', 'pathology', 'module', 'user']);
            $moduleDeliver = $module;
        } else {
            $query = Recipe::with(['patient', 'doctor', 'pathology', 'module', 'user']);
        }
        $query = $this->applyFilters($query, $request);

        return Inertia::render('Recipes/index', ['data' => $query->paginate($paginate), "module" => $moduleDeliver]);
    }

    public function create(Request $request)
    {
        $medicaments = [];

        $patients = [];
        $patientFind = $request->get('patients', null);

        $doctorsFind = $request->get('doctors', null);
        $doctors = [];

        $pathologies = Pathology::get();
        //  $onlyChilds = $request->get('onlyChilds', null);

        if ($patientFind !== null) {
            $patients = Patient::where('c_i', "LIKE", "%" . $patientFind . "%")
                ->orWhere('first_name', "LIKE", "%" . $patientFind . "%")
                ->orWhere('last_name', "LIKE", "%" . $patientFind . "%")
                ->orWhere('n_history', "LIKE", "%" . $patientFind . "%")
                /*  ->when($onlyChilds === true, function ($q) {
                    return $q->where('child', true);
                }) */
                ->get();
        }

        if ($doctorsFind !== null) {
            $doctors = Doctor::where('c_i', "LIKE", "%" . $doctorsFind . "%")
                ->orWhere('first_name', "LIKE", "%" . $doctorsFind . "%")
                ->orWhere('last_name', "LIKE", "%" . $doctorsFind . "%")
                ->orWhere('code', "LIKE", "%" . $doctorsFind . "%")
                ->get();
        }

        if( $request->has('module_id') ) {
            $module = Module::find( $request->get('module_id') );

            if ($module) {
                if (!auth()->user()->hasRole('administrador') && ($module->user_id != auth()->user()->id)) return abort(403);
                $medicaments = $module->medicaments()->with('unit')->get();
            }
        }
        $moduleDeliver = $module ?? null;

        $modules =  Module::with('user')
            ->when(!auth()->user()->hasRole('administrador'), function ($q) {
                return $q->where('user_id', auth()->user()->id);
            })->withoutTrashed()
            ->get();


        return Inertia::render('Recipes/create', compact("pathologies", "doctors", "modules", "medicaments", "moduleDeliver", "patients"));
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
        $recipe->user_id = auth()->user()->id;
        $recipe->save();
   
         
            if (array_key_exists('medicaments', $validated)) {
                array_map(function ($value) use ($recipe) {
                    $recipe->medicaments()->attach($value['id'], ['prescribed_amount' => $value['prescribed_amount'], 'quantity' => $value['quantity_deliver']]);
                }, $validated['medicaments']);
            }
           
  
       
        return redirect(route("recipe.show",$recipe->id));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $recipe = Recipe::withTrashed()->whereId($id)->first();
        $data = $recipe->medicaments()->get();
        return Inertia::render('Recipes/show', ['recipe' => $recipe, 'data' => $data]);
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

    /////////////////////////////////////////
    /**
     * Apply filters and order list
     **/
    private function applyFilters($query, $request)
    {
        $orderBy = $request->get('orderBy', [['id' => "updated_at", 'desc' => true]]);
        $filters = $request->get('filters', []);

        $query->selectRaw('recipes.*');
        $query->join('modules', 'recipes.module_id', '=', 'modules.id');
        $query->join('doctors', 'recipes.doctor_id', '=', 'doctors.id');
        $query->join('patients', 'recipes.patient_id', '=', 'patients.id');

        //fliters iteration
        array_map(function ($filter) use ($query) {
            $id = $filter['id'];
            $value = $filter['value'];

            switch ($id) {
                case 'module':
                    $query->where('modules.name', "LIKE", "%" . $value . "%");
                    break;
                case 'doctor':
                case 'patient':
                    $searchValues = preg_split('/\s+/', $value, -1, PREG_SPLIT_NO_EMPTY);
                    $query->where(function ($q) use ($searchValues, $id) {
                            foreach ($searchValues as $text) {
                                $q->orWhere($id.'s.first_name', 'like', "%{$text}%")
                                ->orWhere($id.'s.last_name', 'like', "%{$text}%");
                            }
                    });
                    break;
                case 'created_at':
                    if (is_array($value)){
                        if( isset($value[0]) && $value[0] !== null ){
                            $query->where('recipes.' . $id, '>=', $value[0]);
                        }
                        if( isset($value[1]) && $value[1] !== null ){
                            $query->where('recipes.' . $id, '<=', $value[1]);
                        }
                    }
                    break;
                default:
                    $query->where('recipes.' . $id, "LIKE", "%" . $value . "%");
                    break;
            }

            return $query;
        }, $filters);

        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] ? "DESC" : 'ASC';

            switch ($id) {
                case 'module':
                    $query->orderBy('modules.name', $sorting);
                    break;
                case 'doctor':
                    $query->orderBy('doctors.first_name', $sorting);
                    break;
                case 'patient':
                    $query->orderBy('patients.first_name', $sorting);
                    break;
                default:
                    $query->orderBy('recipes.' . $id, $sorting);
                    break;
            }

            return $query;
        }, $orderBy);

        return $query;
    }
}
