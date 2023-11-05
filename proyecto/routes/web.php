<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome');
Route::view('/contacto','concact');
Route::view('/blog','blog');
Route::view('/about','about');

// Route::get('/', function () {
//     return view('welcome');
// });


