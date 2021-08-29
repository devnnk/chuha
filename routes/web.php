<?php

use Illuminate\Support\Facades\Route;

use App\Http\Livewire\V2\{HomeLivewire,
    ItemLivewire,
    ProductLivewire,
    CategoryLivewire,
    CartLivewire,
    SearchLivewire,
    OrderSuccessLivewire};
use App\Http\Controllers\Admin\{CategoryController,
    ProductController,
    ItemController,
    BannerController,
    LanguageController,
    HomeController
};
use App\Http\Controllers\{TestController, SetLanguageController, OrderController, CartController};

Route::get('/', HomeLivewire::class)->name('index');


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware(['auth:sanctum', 'verified'])->resource('category', CategoryController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('product', ProductController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('item', ItemController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('banner', BannerController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('language', LanguageController::class)->except('update');
    Route::middleware(['auth:sanctum', 'verified'])->resource('dashboard', HomeController::class)->only('index');
});

Route::get('{code}', ItemLivewire::class)->name('item');
Route::get('category/{code}', CategoryLivewire::class)->name('category');
Route::get('product/{code}', ProductLivewire::class)->name('product');
Route::get('list/cart', CartLivewire::class)->name('cart');
Route::post('list/cart', [CartController::class, 'store'])->name('cart.store');
Route::get('order/{order_id}', [OrderController::class, 'store'])->name('order');
Route::get('order-success/{order_id}', OrderSuccessLivewire::class)->name('order-success');
Route::get('item/search', SearchLivewire::class)->name('search');
Route::get('set/language', [SetLanguageController::class, 'setLanguage'])->name('set-language');

Route::get('test/site', [TestController::class, 'testRank']);
//Route::get('/test', [TestController::class, 'index']);
//Route::get('/', HomeLivewire::class)->name('index');
