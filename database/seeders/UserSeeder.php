<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //criando dados falsos com este usuario credenciado
        User::create([
            'name' => 'luiz antonio',
            'email' => 'luiz@luiz.com',
            'password' => bcrypt('12345678')
        ]);

        User::factory(9)->create();
    }
}
