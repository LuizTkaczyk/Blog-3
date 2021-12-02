<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;

//importar para fazer o uso da paginação
use Livewire\WithPagination;

class UserIndex extends Component
{
    use WithPagination;

    //indicar para poder usar os estilos do bootstrap
    protected $paginationTheme = "bootstrap";

    //implementando o buscador de usuarios
    public $search;


    //função que reseta as paginas, fazendo com que a busca seja feita em toda a tabela
    public function updatingSearch()
    {
        $this->resetPage();
    }


    public function render()
    {
        $users = User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate();


        return view('livewire.admin.user-index', compact('users'));
    }
}
