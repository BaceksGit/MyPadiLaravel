<?php

use Illuminate\Support\Facades\Route;
use Modules\Listtreatments\Http\Controllers\ListtreatmentsController;

Route::middleware(['auth', 'verified'])->group(function () {
    Route::resource('listtreatments', ListtreatmentsController::class)->names('listtreatments');
});
