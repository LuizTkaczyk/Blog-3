<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

use App\Http\Requests\PostRequest;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    //protegendo  as rotas 
    public function __construct()
    {
        $this->middleware('can:admin.posts.index')->only('index');
        $this->middleware('can:admin.posts.create')->only('create','store');
        $this->middleware('can:admin.posts.edit')->only('edit','update');
        $this->middleware('can:admin.posts.destroy')->only('destroy');
    }

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

        Cache::flush();

        if ($request->tags) {
            $post->tags()->attach($request->tags);
        }

        return redirect()->route('admin.posts.index', $post);
    }

    //função eliminada que deve ser declarada nas rotas, em except
    // public function show(Post $post)
    // {
    //     return view('admin.posts.show', compact('post'));
    // }


    public function edit(Post $post)
    {

        //fazendo a verificação para que um usuario não edite a postagem de outros usuarios (essa autenticação ira vir de PostPolicy)
        $this->authorize('author', $post);

        $categories = Category::pluck('name', 'id'); //capturando as categorias no banco
        $tags = Tag::all();
        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }


    public function update(PostRequest $request, Post $post)
    {

        //fazendo a verificação para que um usuario não edite a postagem de outros usuarios (essa autenticação ira vir de PostPolicy)
        $this->authorize('author', $post);
        $post->update($request->all());

        if ($request->file('file')) {
            $url = Storage::put('posts', $request->file('file'));

            if ($post->image) {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            } else {
                $post->image()->create([
                    'url' => $url
                ]);
            }
        }

        if ($request->tags) {
            //metodo attach sempre ira adicionar um valor ao bd, ou seja, usar o sync para sincronizar com o bd
            $post->tags()->sync($request->tags);
        }

        Cache::flush();

        return redirect()->route('admin.posts.edit', $post)->with('info', 'O post foi atualizado com sucesso');
    }

    public function destroy(Post $post)
    {
        //fazendo a verificação para que um usuario não edite a postagem de outros usuarios (essa autenticação ira vir de PostPolicy)
        $this->authorize('author', $post);

        $post->delete();

        Cache::flush();

        return redirect()->route('admin.posts.index', $post)->with('info', 'O post foi excluido com sucesso');
    }
}
