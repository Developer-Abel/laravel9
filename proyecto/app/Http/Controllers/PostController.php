<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostController extends Controller{
   function index(){
      $post = [
         ['title' =>'Titulo 1'],
         ['title' =>'Titulo 2'],
         ['title' =>'Titulo 3'],
         ['title' =>'Titulo 4'],
      ];
      return view('blog', ['post'=>$post]);
   }
}
