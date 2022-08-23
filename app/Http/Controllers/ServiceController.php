<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:service.index')->only(['index']);
        $this->middleware('can:service.store')->only(['store']);
        $this->middleware('can:service.destroy')->only(['destroy']);
        $this->middleware('can:service.update')->only(['update']);
    }

    public function index()
    {
        $items = Service::get();
        return Inertia::render('Services/index', ['data' => $items]);
    }
}
