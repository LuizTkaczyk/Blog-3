<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Storage;

class PostObserver
{
   
    public function creating(Post $post)
    {
        //cada vez que um post for publicado, será associado ao usuario logado/autenticado
       if(! \App::runningInConsole()){
        $post->user_id = auth()->user()->id ;
       }
    }

    
    //o eveto delete será chamado cadas vez que um post for exluido, assim excluindo a imagem da pasta de imagens
    public function deleting(Post $post)
    {
        if($post->image){
            Storage::delete($post->image->url);
        }
    }


}
