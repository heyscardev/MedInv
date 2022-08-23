<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Inertia\Inertia;

class UnitController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:unit.index')->only(['index']);
        $this->middleware('can:unit.store')->only(['store']);
        $this->middleware('can:unit.destroy')->only(['destroy']);
        $this->middleware('can:unit.update')->only(['update']);
    }

    public function index()
    {
        $items = Unit::get();
        return Inertia::render('Units/index',['data'=>$items]);
    }
}
