<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportTypes = [
        'userRegister',
        'buys',
        'transfers',
        'patient',
        'recipes',
        'medicament',
        'medicamentsMovements'
    ];
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  inertia('Reports/index', ['reportTypes' => $this->reportTypes]);
    }


    public function show(Request $request, $report_type)
    {
        $start_date = $request->get('start_date');
        $end_date = $request->get('end_date');
        switch ($report_type) {
            case "userRegister":
                $users = User::when($start_date, function ($q, $start_date) {
                   
                    return $q->where('created_at', ">=", $start_date);
                })
                    ->when($end_date, function ($q, $end_date) {
                        return $q->where('created_at', "<=", $end_date);
                    })->get();
                return inertia('Reports/UserRegister', [
                    "users"=>$users,
                    "totalUsers"=>$users->count(),
                ]);
                break;
            default:
                return redirect('report.index');
                break;
        }
    }
}
