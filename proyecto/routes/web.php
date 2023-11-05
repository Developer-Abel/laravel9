<?php

use Illuminate\Support\Facades\Route;

Route::view('/','welcome')->name('home');
Route::view('/otronombre','concact')->name('contact');
Route::view('/blog','blog')->name('blog');
Route::view('/about','about')->name('about');

// Route::get('/', function () {
//     return view('welcome');
// });


