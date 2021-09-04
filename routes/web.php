<?php

use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->Middleware('auth');

use App\Http\Controllers\PersonaController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;

Route::get(
    '/usuario/{nombre_usuario?}',
    [PersonaController::class, 'mostrar']
)
    ->where('nombre_usuario', '[A-Za-z]+');

Route::get('/products', [ProductController::class, 'show']);
Route::get('/brands', [BrandController::class, 'show']);

Route::get('/product/form/{id?}', [ProductController::class, 'form'])->name('product.form');
Route::get('/brand/form/{id?}', [BrandController::class, 'form'])->name('brand.form');

Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');
Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');

Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
