<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller{
   function index(){
      $post = Post::get();
      return view('post.index', ['post'=>$post]);
   }
   function show(Post $post){
      return view('post.show',[
         'Post' => $post
      ]);
   }
   function create(){
      return view('post.create');
   }
   function store(Request $request){
      $post = New Post;
      $post->title = $request->input('title');
      $post->body = $request->input('body');
      $post->save();

      return to_route('post.index');
   }
}
