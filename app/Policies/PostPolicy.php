<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use App\Models\Post;

class PostPolicy
{
    use HandlesAuthorization;

    //verificando se o usuario que esta tentando editar o post, é o mesmo que está logado
    public function author(User $user, Post $post){
        if($user->id == $post->user_id){
            return true;
        }else{
            return false;
        }
    }

    //impedindo de acessar um post caso ele não esteja publicado
    public function published(?User $user, Post $post){
        if($post->status == 2){
            return true;
        }else{
            return false;
        }
    }
}
