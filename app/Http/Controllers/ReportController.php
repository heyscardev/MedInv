<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Medicament;
use App\Models\Patient;
use App\Models\User;
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
            default:
                return redirect('report.index');
                break;
        }
    }
}
