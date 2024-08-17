<?php

use App\Http\Controllers\api\StatusController;
use App\Http\Controllers\api\v1\SearchController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('/v1')->group(function () { 
    Route::post('/statusChange',[StatusController::class,'change'])->name('status.change');
    Route::get('/search',[SearchController::class,'search'])->name('search');
 });
