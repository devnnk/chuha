<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\V2\HomeLivewire;
use App\Http\Controllers\TestController;
use App\Http\Controllers\Admin\{CategoryController, ProductController, ItemController};

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->resource('category', CategoryController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('product', ProductController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('item', ItemController::class)->except('update');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/test', HomeLivewire::class)->name('category');
//Route::get('/test', [TestController::class, 'index']);
//Route::get('/', HomeLivewire::class)->name('index');
