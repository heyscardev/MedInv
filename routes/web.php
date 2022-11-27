<?php

use App\Http\Controllers\BuyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\ModuleBuyController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ServiceController;
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

    Route::resource('doctors', DoctorController::class)->only(['index', 'destroy', 'update', 'store'])->names('doctor');
    Route::resource('medicaments', MedicamentController::class)->only(['index', 'destroy', 'update', 'store'])->names('medicament');
    Route::resource('modules', ModuleController::class)->only(['index', 'destroy', 'update', 'store', 'show'])->names('module');
    Route::resource('patients', PatientController::class)->only(['index', 'destroy', 'update', 'store'])->names('patient');
    Route::resource('recipes', RecipeController::class)->only(['index', 'destroy', 'update', 'store'])->names('recipe');
    Route::get('recipes/create/{module?}', [RecipeController::class, 'create'])->name('recipe.create');
    Route::resource('services', ServiceController::class)->only(['index', 'destroy', 'update', 'store'])->names('service');
    Route::resource('units', UnitController::class)->only(['index', 'destroy', 'update', 'store'])->names('unit');
    Route::resource('users', UserController::class)->only(['index', 'destroy', 'update', 'store'])->names('user');
    Route::get('users/restore/{id}',[UserController::class,"restore"])->name('user.restore');

    Route::get('modules/{module}/buy/create', [ModuleBuyController::class, 'create'])->name('module.buy.create');
    Route::post('modules/{module}/buy', [ModuleBuyController::class, 'store'])->name('module.buy.store');
    Route::get('modules/{module}/buy', [ModuleBuyController::class, 'index'])->name('module.buy.index');
    Route::get('buys',[BuyController::class,'index'])->name('buy.index');
});

require __DIR__.'/medinv/TransfersRoute.php';
require __DIR__ . '/auth.php';
