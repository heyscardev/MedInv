<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ModuleBuyController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|------------------------------------------------------------------------------------------
| Rutas Web
|------------------------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| las rutas son cargadas por el RouteServiceProvider dentro de un grupo que
| contiene el grupo de middleware "web". ¡Ahora crea algo grandioso!
|
*/

Route::get('', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'destroy', 'update', 'store'])->names('user');
    Route::resource('medicaments', MedicamentController::class)->only(['index', 'destroy', 'update', 'store'])->names('medicament');
    Route::resource('units', UnitController::class)->only(['index', 'destroy', 'update', 'store'])->names('unit');
    Route::resource('doctors', DoctorController::class)->only(['index', 'destroy', 'update', 'store'])->names('doctor');
    Route::resource('patitents', PatientController::class)->only(['index', 'destroy', 'update', 'store'])->names('patient');
    Route::resource('modules', ModuleController::class)->only(['index', 'show'])->names('module');

    Route::get('modules/{module}/buy/create', [ModuleBuyController::class, 'create'])->name('module.buy.create');
    Route::post('modules/{module}/buy', [ModuleBuyController::class, 'store'])->name('module.buy.store');
    Route::get('modules/{module}/buy', [ModuleBuyController::class, 'index'])->name('module.buy.index');
   Route::get('buys',[BuyController::class,'index'])->name('buy.index');
});
require __DIR__ . '/auth.php';
