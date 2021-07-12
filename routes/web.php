<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\HomeLivewire;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\CategoryController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/test', [TestController::class, 'index']);

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->resource('category', CategoryController::class)->except('update');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Route::get('/', HomeLivewire::class)->name('index');
