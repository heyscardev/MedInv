<?php

namespace App\Http\Controllers;

use App\Http\Requests\TransferRequest;
use App\Models\Module;
use App\Models\Transfer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class TransferController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:transfer.index')->only(['index']);
        $this->middleware('can:transfer.store')->only(['store']);
        $this->middleware('can:transfer.destroy')->only(['destroy']);
        $this->middleware('can:transfer.update')->only(['update']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(TransferRequest $request,Module $module)
    {
      
        $paginate = max(min($request->get('page_size'), 100), 10);
      
        $paginate = max(min($request->get('page_size'), 100), 10);
        if ($module->exists) {
            $query = $module->transfers()->with('moduleSend', 'moduleReceive', 'user');
            
        } else {
            $query  = Transfer::with('moduleSend', 'moduleReceive', 'user')->where('transfers.user_id',auth()->user()->id);
            $module = null;
        }
       
        $query  = $this->applyFilters($query, $request);
        $data   = $query->paginate($paginate);

        return inertia('Transfers/index', compact('data','module'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(TransferRequest $request, Module $module)
    {
        $moduleSelected = null;
        $medicaments = [];
        $selectedMedicaments = [];
        if ($module->exists) {

            $moduleSelected = $module;
            $medicaments = $module->medicaments()->wherePivot('quantity_exist', ">", 0)->get();
            $selectedMedicaments =  $module->medicaments()->wherePivot('quantity_exist', ">", 0)->findMany($request->get('selected_medicaments'));
        }
        $moduleFromTransfers = User::find(auth()->user()->id)->modules()->with('user')->get();
        $moduleToTransfers = Module::with('user')->get();
        return inertia('Transfers/Create', compact('moduleToTransfers', 'moduleFromTransfers', 'moduleSelected', 'selectedMedicaments', 'medicaments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TransferRequest $request)
    {
        $transfer = new Transfer(
            [
                'module_send_id' => $request->input('module_send_id'),
                'module_receive_id' => $request->input('module_receive_id'),
                'user_id' => auth()->user()->id,
                'description' => $request->input('description')
            ]
        );
        $transfer->save();
        array_map(
            fn ($value) => $transfer->medicaments()->attach($value['id'], ['quantity' => $value['quantity']]),
            $request->input('medicaments', [])
        );
        return Redirect(route('transfer.create', $request->input('module_send_id')));
    }


    /////////////////////////////////////////
    /**
     * Apply filters and order list
     **/
    private function applyFilters($query, $request)
    {
        $orderBy = $request->get('orderBy', [['id' => "created_at", 'desc' => true]]);
        $filters = $request->get('filters', []);

        array_map(function ($filter) use ($query) {
            $id = $filter['id'];
            $value = $filter['value'];

            if (str_contains($id, "module_send."))
                return $query->whereModuleSend(str_replace('module_send.', '', $id), $value);
            if (str_contains($id, "module_receive."))
                return $query->whereModuleReceive(str_replace('module_receive.', '', $id), $value);
            if (str_contains($id, "user."))
                return $query->whereUser(str_replace('user.', '', $id), $value);

            return $query->LikeOrBeetween('transfers.' . $id, $value);
        }, $filters);

        //fliters orders
        array_map(function ($by) use ($query) {
            $id = $by['id'];
            $sorting = $by['desc'] ? "DESC" : 'ASC';

            if (str_contains($id, "module_send."))
                return $query->orderByModuleSend(str_replace('module_send.', '', $id), $sorting);
            if (str_contains($id, "user."))
                return $query->orderByUser(str_replace('user.', '', $id), $sorting);
            if (str_contains($id, "module_receive."))
                return $query->orderByModuleReceive(str_replace('module_receive.', '', $id), $sorting);

            return $query->orderBy('transfers.' . $id, $sorting);
        }, $orderBy);

        return $query;
    }
    /**
     * end function apply filters and order list
     **/
}
