<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

use App\Models\Post;

use Livewire\WithPagination;

class PostsIndex extends Component
{
    //importar withPagination para usar a paginação com o livewire  e o paginationTheme para substituir os estilos o tailwind por os do bootstrap
    use WithPagination;
    protected $paginationTheme = "bootstrap";

    //criando a propriedade de busca de posts
    public $search;


    //função que reseta as paginas, fazendo com que a busca seja feita em toda a tabela
    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {

        //retorna os posts do usuario devidamente autenticado
        $posts = Post::where('user_id', auth()
            ->user()->id)
            ->where('name', 'LIKE', '%' . $this->search . '%') //criando o modo de busca
            ->latest('id')
            ->paginate(10);

        return view('livewire.admin.posts-index', compact('posts'));
    }
}
