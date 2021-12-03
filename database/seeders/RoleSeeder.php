<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
//pacote role de laravel permissions
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    public function run()
    {
        //criando as permissoes para o blog
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Blogger']);

        Permission::create(['name' => 'admin.home','description' => 'Ver o painel'])->syncRoles([$role1,$role2]);
        
        Permission::create(['name' => 'admin.users.index','description' => 'Ver lista de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit','description' => 'Editar uma função'])->syncRoles([$role1]);
        //Permission::create(['name' => 'admin.users.update','description' => ''])->syncRoles([$role1]);

        //PERMISSÕES PARA GERENCIAR AS CATEGORIAS
        Permission::create(['name' => 'admin.categories.index','description' => 'Ver lista de categorias'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.categories.create','description' => 'Criar categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.edit','description' => 'Editar categorias'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.categories.destroy','description' => 'Excluir categorias'])->syncRoles([$role1]);

        //PERMISSÕES PARA GERENCIAR AS TAGS
        Permission::create(['name' => 'admin.tags.index','description' => 'Ver lista de tags'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.tags.create','description' => 'Criar tag'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.edit','description' => 'Editar tag'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.tags.destroy','description' => 'Excluir tag'])->syncRoles([$role1]);

        //PERMISSÕES PARA GERENCIAR os post
        Permission::create(['name' => 'admin.posts.index','description' => 'Ver posts'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.create','description' => 'Criar posts'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.edit','description' => 'Editar posts'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.posts.destroy','description' => 'Excluir posts'])->syncRoles([$role1,$role2]);
    }
}
