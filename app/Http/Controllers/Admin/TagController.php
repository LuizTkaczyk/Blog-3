<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;


class TagController extends Controller
{
    
    public function index()
    {
        $tags = Tag::all();
        return view('admin.tags.index', compact('tags'));
    }

   
    public function create()
    {
        $colors = [
            'red' => 'Vermelho',
            'yellow' => 'Amarelo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'pink' => 'Rosa',
            'indigo' => 'Indigo'
        ];
        return view('admin.tags.create', compact('colors'));
    }

   
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:tags',
            'color' => 'required',
        ]);

        $tag = Tag::create($request->all());
        return redirect()->route('admin.tags.edit', compact('tag'))->with('info', 'A etiqueta foi criada com sucesso');
    }

    
    public function show($tag)
    {
        return view('admin.tags.show', compact('tag'));
    }

    
    public function edit(Tag $tag)
    {
        $colors = [
            'red' => 'Vermelho',
            'yellow' => 'Amarelo',
            'green' => 'Verde',
            'blue' => 'Azul',
            'pink' => 'Rosa',
            'indigo' => 'Indigo'
        ];
        return view('admin.tags.edit', compact('tag', 'colors'));
    }

    
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:tags,slug,$tag->id",
            'color' => 'required',
        ]);

        $tag->update($request->all());
        return redirect()->route('admin.tags.edit', $tag)->with('info', 'A etiqueta foi atualizada com sucesso');
    }

   
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('admin.tags.index')->with('info', 'A etiqueta foi excluída com sucesso');
    }
}
