<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::controller(ProductController::class)->group(function() {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/show/{product}', 'show')->name('products.show');
    Route::get('/products/create', 'create')->name('products.create');
    Route::post('/products', 'store')->name('products.store');
    Route::get('/products/edit/{product}', 'edit')->name('products.edit');
    Route::put('/products/update/{product}', 'update')->name('products.update');
    Route::delete('/products/{product}', 'destroy')->name('products.destroy');
    Route::get('/products/search', 'search')->name('search');
});
