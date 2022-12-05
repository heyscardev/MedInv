<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportController extends Controller
{
    private $reportTypes =[
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
       return  inertia('Reports/index',['reportTypes'=>$this->reportTypes]);
    }

    
    public function show($id)
    {
        //
    }

    
}
