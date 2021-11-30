<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //campos de categoria a serem enviados ao banco de dados
    protected $fillable = ['name', 'slug'];

    //função para retornar a url amigavel
    public function getRouteKeyName(){
        return 'slug';
    }

    //Relação um para muitos
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
