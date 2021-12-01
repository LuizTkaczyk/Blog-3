<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use App\Http\Requests\PostRequest;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    public function index()
    {
        return view('admin.posts.index');
    }


    public function create()
    {

        //o método pluck retorna um array apenas com o campo nome dos objetos/posts
        $categories = Category::pluck('name', 'id'); //captuando as categorias no banco
        $tags = Tag::all();

        return view('admin.posts.create', compact('categories', 'tags'));
    }


    public function store(PostRequest $request)
    {

        // return Storage::put('posts', $request->file('file'));

        $post = Post::create($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url' => $url
            ]);
        }

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.edit', $post);
    }


    public function show(Post $post)
    {
        return view('admin.posts.show', compact('post'));
    }


    public function edit(Post $post)
    {
        $categories = Category::pluck('name', 'id'); //captuando as categorias no banco
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post','categories','tags'));
    }


    public function update(PostRequest $request, Post $post)
    {
        //
    }

    public function destroy(Post $post)
    {
        //
    }
}
