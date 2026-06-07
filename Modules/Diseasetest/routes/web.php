<?php

use Illuminate\Support\Facades\Route;
use Modules\Diseasetest\Http\Controllers\DiseasetestController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('diseasetest', DiseasetestController::class)->names('diseasetest');
});

Route::get('/', [DiseasetestController::class, 'index'])
    ->name('diseasetest.index');
