<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productcontroller;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/product', function () {
    return view('product');
});

Route::post('/addproduct',[productcontroller::class,'addproduct']);

Route::get('display',[productcontroller::class,'display']);

Route::view('/list-p','list-product');
Route::get('/edit/{id}',[productcontroller::class,'edit']);
Route::put('/update/{id}',[productcontroller::class,'update']);
Route::get('delete/{id}',[productcontroller::class,'delete']);
Route::get('/search', [productcontroller::class, 'search']);