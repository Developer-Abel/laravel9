<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;



Route::view('/','welcome')->name('home');
Route::view('/otronombre','concact')->name('contact');

Route::get('/blog',[PostController::class,'index'])->name('post.index');
Route::get('/blog/create',[PostController::class,'create'])->name('post.create'); // importante el orden
Route::post('/blog',[PostController::class,'store'])->name('post.store');
Route::get('/blog/{post}',[PostController::class,'show'])->name('post.show');

Route::view('/about','about')->name('about');


