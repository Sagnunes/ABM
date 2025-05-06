<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $random = new \App\Classes\randomID();
        // Cria SUPER ADMIN
        App\User::create([
            'name'=>'Administrador',
            'email'=>'admin@abm.wisi.pt',
            'password'=>bcrypt('T@g000dri'),
            'status'=>1,

        ]);
    }
}
