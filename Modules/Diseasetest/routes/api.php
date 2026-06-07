<?php

use Illuminate\Support\Facades\Route;
use Modules\Diseasetest\Http\Controllers\DiseasetestController;

Route::middleware(['auth:sanctum'])->prefix('v1')->group(function () {
    Route::apiResource('diseasetests', DiseasetestController::class)->names('diseasetest');
});
