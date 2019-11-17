<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'      => 'Danilo Araujo de Souza',
            'email'     =>  'danilo.souza@edu.unipar.br',
            'password'  => bcrypt('1234'),
            'biography' => 'Usuário Fulano de Tal',
        ]);

        DB::table('users')->insert([
            'name'      => 'Eliandra Vendrame',
            'email'     =>  'eliandra@email.com',
            'password'  => bcrypt('secret'),
            'biography' => 'Usuário Fulano de Tal',
        ]);
    }
}
