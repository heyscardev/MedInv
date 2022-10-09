<?php

use App\Http\Controllers\TransferController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('transfers/create/{module?}', [TransferController::class, 'create'])->name('transfer.create');
    Route::post('transfers', [TransferController::class, 'store'])->name('transfer.store');

});
