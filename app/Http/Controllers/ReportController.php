<?php

namespace App\Http\Controllers;

use App\Models\Buy;
use App\Models\Doctor;
use App\Models\Medicament;
use App\Models\Patient;
use App\Models\Recipe;
use App\Models\Transfer;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportTypes = [
        'userRegister',
        'doctors',
        'patients',
        'medicaments',
        'transfers',
        'buys',
        'recipes',
        // 'medicamentsMovements'
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
        $start_date = Carbon::parse( $request->get('start_date') )->format('Y-m-d');
        $end_date = Carbon::parse( $request->get('end_date') )->format('Y-m-d');

        switch ($report_type) {
            case "userRegister":
                $data = User::whereBetween('created_at', [$start_date, $end_date] )->orderby('first_name')->get();
                $total_rows = $data->count();
                return inertia('Reports/UserRegister', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            case "doctors":
                $data = Doctor::whereBetween('created_at', [$start_date, $end_date] )->orderby('first_name')->get();
                $total_rows = $data->count();
                return inertia('Reports/Doctors', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            case "patients":
                $data = Patient::whereBetween('created_at', [$start_date, $end_date] )->orderby('first_name')->get();
                $total_rows = $data->count();
                return inertia('Reports/Patients', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            case "medicaments":
                $data = Medicament::whereBetween('created_at', [$start_date, $end_date] )->orderby('name')->get();
                $total_rows = $data->count();
                return inertia('Reports/Medicaments', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            case "transfers":
                $data = Transfer::whereBetween('created_at', [$start_date, $end_date] )->orderby('created_at')->get();
                $total_rows = $data->count();
                return inertia('Reports/Transfers', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            case "buys":
                $data = Buy::whereBetween('created_at', [$start_date, $end_date] )->orderby('created_at')->get();
                $total_rows = $data->count();
                return inertia('Reports/Buys', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            case "recipes":
                $data = Recipe::whereBetween('created_at', [$start_date, $end_date] )->orderby('created_at')->get();
                $total_rows = $data->count();
                return inertia('Reports/Recipes', compact(
                    "data",
                    "total_rows",
                    "report_type",
                    "start_date",
                    "end_date",
                ));
                break;
            default:
                return redirect('report.index');
                break;
        }
    }
}
