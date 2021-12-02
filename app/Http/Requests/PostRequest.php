<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{

    //verificando se o usuario está autorizado a realizar uma publicação
    public function authorize()
    {
        return true;
    }


    public function rules()
    {

        $post = $this->route()->parameter('post');
        //caso o valor de status seja 1
        $rules = [
            'name' => 'required',
            'slug' => 'required|unique:posts',
            'status' => 'required|in:1,2', //o campo status aceitará somente os valores 1 e 2
            'file' => 'image'
        ];

        if($post){
            $rules['slug'] = 'required|unique:posts,slug,' . $post->id;
        }

        //caso o valor de status seja 2
        if ($this->status == 2) {
            $rules = array_merge($rules, [
                'category_id' => 'required',
                'tags' => 'required',
                'extract' => 'required',
                'body' => 'required'
            ]);
        }

        return $rules;
    }
}
