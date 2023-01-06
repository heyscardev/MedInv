<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\BuyController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\MedicamentController;
use App\Http\Controllers\MedicamentGroupController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\PathologyController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TransferController;
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
Route::get('/dashboard/{page?}', function ($page = null) {
    return Inertia::render('Dashboard', ['page' => $page ]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    //* User Activity
    Route::resource('user-activity', ActivityController::class)->only(['index'])->names('user.activity');

    //* Users
    Route::resource('users', UserController::class)->except(['create','edit','show'])->names('user');
    Route::get('users/restore/{id}',[UserController::class,"restore"])->name('user.restore');

    //* Doctors
    Route::resource('doctors', DoctorController::class)->except(['create','edit'])->names('doctor');
    Route::get('doctor/restore/{id}',[DoctorController::class,"restore"])->name('doctor.restore');

    //* Patients
    Route::resource('patients', PatientController::class)->except(['create','edit','show'])->names('patient');
    Route::get('patients/restore/{id}',[PatientController::class,"restore"])->name('patient.restore');

    //* Medicaments
    Route::resource('medicaments', MedicamentController::class)->except(['create','edit','show'])->names('medicament');

    //* Pathologies
    Route::resource('pathologies', PathologyController::class)->except(['create','edit','show'])->names('pathology');

    //* Services
    Route::resource('services', ServiceController::class)->except(['create','edit','show'])->names('service');

    //* Units
    Route::resource('units', UnitController::class)->except(['create','edit','show'])->names('unit');

    //* Medicament Groups
    Route::resource('medicament-groups', MedicamentGroupController::class)->except(['create','edit','show'])->names('medicament.group');

    //* Modules
    Route::resource('modules', ModuleController::class)->except(['create','edit'])->names('module');
    Route::group(['prefix'=>'modules', 'as'=>'module.'], function()
    {
        Route::get('restore/{id}',[ModuleController::class,"restore"])->name('restore');

        Route::get('{module}/transfers', [TransferController::class, 'index'])->name('transfer.index');
        Route::get('{module}/recipes', [RecipeController::class, 'index'])->name('recipe.index');
        Route::get('{module}/buys', [BuyController::class,'index'])->name('buy.index');
    });

    //* Recipes
    Route::resource('recipes', RecipeController::class)->except(['edit'])->names('recipe');

    //* Buys
    Route::resource('buys', BuyController::class)->except(['edit'])->names('buy');
 /*    Route::group(['prefix'=>'buys', 'as'=>'buy.'], function()
    {

        Route::get('edit/{buy}/{module?}', [BuyController::class, 'edit'])->name('edit');
    }); */

    //* Transfers
    Route::resource('transfers', TransferController::class)->except(['edit'])->names('transfer');
/*     Route::group(['prefix'=>'transfers', 'as'=>'transfer.'], function()
    {
        Route::get('edit/{transfer}/{module?}', [TransferController::class, 'edit'])->name('edit');
    }); */

    //* Reports
    Route::get('reports',[ReportController::class,'index'])->name('report.index');
    Route::get('reports/{report_type}',[ReportController::class,'show'])->name('report.show');

});
Route::get('/information', function () {
    return Inertia::render('SystemInformation/index');
})->name("information");

require __DIR__ . '/auth.php';
