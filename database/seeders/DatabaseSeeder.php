<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //deletando os arquivos da pasta posts
        Storage::deleteDirectory('posts');
        //criando uma pasta
        Storage::makeDirectory('posts');


        //chamando o metodo roleSeeder
        $this->call(RoleSeeder::class);

        //Incluindo os dados falsos no bd através da classe UserSeeder
        $this->call(UserSeeder::class);
        Category::factory(4)->create();
        Tag::factory(8)->create();
        $this->call(PostSeeder::class);
    }
}
