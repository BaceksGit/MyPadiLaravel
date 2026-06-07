<?php

use Illuminate\Support\Facades\Route;
use Modules\Listtreatments\Http\Controllers\ListtreatmentsController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('listtreatments', ListtreatmentsController::class)->names('listtreatments');
});
Route::get('/diseases', [ListtreatmentsController::class, 'index']);
