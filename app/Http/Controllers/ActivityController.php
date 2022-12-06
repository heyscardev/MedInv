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
        $userId = $request->get('user');
        $data = Log::orderBy('id','desc')->when($userId,function($q,$userId){
            return $q->where('user_id',$userId);
        })->get();
      
        return Inertia::render('Activity/index', ['data' => $data]);
    }
}
