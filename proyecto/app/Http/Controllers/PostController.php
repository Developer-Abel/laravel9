<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\SavePostRequest;

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

   function store(SavePostRequest $request){
      Post::create($request->validated());
      return to_route('post.index')->with('status','Post creado!');
   }

   function edit(Post $post){
      return view('post.edit', ['post'=>$post]);
   }

   function update(SavePostRequest $request, Post $post){
      $post->update($request->validated());
      return to_route('post.show',$post)->with('status','Post Actualizado!');
   }
}
