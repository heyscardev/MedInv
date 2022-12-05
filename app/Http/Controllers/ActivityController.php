<?php
namespace App\Http\Controllers;


use App\Models\Log;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ActivityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = Log::orderBy('id','desc')->get();
        return Inertia::render('Activity/index', ['data' => $data]);
    }
}
