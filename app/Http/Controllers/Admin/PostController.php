<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;

class PostController extends Controller
{
    
    public function index()
    {
        return view ('admin.posts.index');
    }

    
    public function create()
    {

        //o método pluck retorna um array apenas com o campo nome dos objetos/posts
        $categories = Category::pluck('name','id');

        return view ('admin.posts.create',compact('categories'));
    }

    
    public function store(Request $request)
    {
        //
    }

  
    public function show(Post $post)
    {
        return view ('admin.posts.show', compact('post'));
    }

   
    public function edit(Post $post)
    {
        return view ('admin.posts.edit', compact('post'));
    }

    
    public function update(Request $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
