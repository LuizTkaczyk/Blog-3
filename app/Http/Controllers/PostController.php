<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;



class PostController extends Controller
{
    public function index()
    {
        $posts = Post::where('status', 2)->latest('id')->paginate(10);
        return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {

        // filtrando os posts similares cuja a id da categoria seja igual a id de categoria do post
        $similares = Post::where('category_id', $post->category_id)
            ->where('status', 2)
            ->where('id', '!=', $post->id) //evitando de mostrar o post ativo novamente nos posts laterais
            ->latest('id')
            ->take(4)
            ->get();

        return view('posts.show', compact('post', 'similares'));
    }

    public function category(Category $category)
    {
        $posts = Post::where('category_id', $category->id)
            ->where('status', 2)
            ->latest('id')
            ->paginate(5);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){
        $posts =  $tag->posts()->where('status',2)->latest('id')->paginate(5);

        return view('posts.tag', compact('posts', 'tag'));
    }
}
