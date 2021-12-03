<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use com;

class CategoryController extends Controller
{

    //protegendo  as rotas 
    public function __construct()
    {
        $this->middleware('can:admin.categories.index')->only('index');
        $this->middleware('can:admin.categories.create')->only('create','store');
        $this->middleware('can:admin.categories.edit')->only('edit','update');
        $this->middleware('can:admin.categories.destroy')->only('destroy');
    }
   
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

   
    public function create()
    {
        return view('admin.categories.create');
    }

    
    public function store(Request $request)
    {
        //criando as validações para o campo categories, e verificando se o nome do slug é unico
        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        
        $category = Category::create($request->all());

        return redirect()->route('admin.categories.index', $category)->with('info', 'A categoria foi criada com sucesso!');
    }
    
    //função eliminada que deve ser declarada nas rotas, em except
    // public function show(Category $category)
    // {
    //     return view('admin.categories.show', compact('category'));
        
    // }
    
    
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:categories,slug,$category->id"
        ]);

        $category->update($request->all());
        return redirect()->route('admin.categories.edit', $category)->with('info', 'A categoria foi atualizada!');
    }

    
    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')->with('info', 'A categoria foi excluida com sucesso!');
    }
}
