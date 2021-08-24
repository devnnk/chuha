<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\V2\{HomeLivewire, ItemLivewire, ProductLivewire, CategoryLivewire};
use App\Http\Controllers\Admin\{CategoryController, ProductController, ItemController, BannerController};

Route::get('/', HomeLivewire::class);


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->resource('category', CategoryController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('product', ProductController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('item', ItemController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('banner', BannerController::class)->except('update');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('{item}', ItemLivewire::class)->name('item');
Route::get('category/{code}', CategoryLivewire::class)->name('category');
Route::get('product/{code}', ProductLivewire::class)->name('product');
//Route::get('/test', [TestController::class, 'index']);
//Route::get('/', HomeLivewire::class)->name('index');
