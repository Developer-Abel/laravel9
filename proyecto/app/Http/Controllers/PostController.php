<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{
   function index(){
      // $post = DB::table('post')->get();
      $post = Post::get();
      return view('post.index', ['post'=>$post]);
   }
   function show(Post $post){
      // return Post::find($post);
      // return Post::findOrFail($post);
      // return $post;
      return view('post.show',[
         'Post' => $post
      ]);
   }
}
