<?php

use App\Http\Controllers\BrandController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// SHow all brands
Route::get('/', [BrandController::class, 'index'])->name('brands.index');