<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{
   function index(){
      // $post = DB::table('post')->get();
      $post = Post::get();
      return view('blog', ['post'=>$post]);
   }
}
