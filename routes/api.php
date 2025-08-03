<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrandController;

Route::get('/test', function(){
    return ['message' => 'API works'];
}) ;


Route::post('/brands', [BrandController::class, 'store']);
