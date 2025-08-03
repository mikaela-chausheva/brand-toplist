<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/test', function(){
    return ['message' => 'API works'];
}) ;

// CREATE
Route::post('/brands', [BrandController::class, 'store']);
// UPDATE
Route::put('/brands/{id}', [BrandController::class, 'update']);
// DELETE
Route::delete('/brands/{id}', [BrandController::class, 'destroy']);