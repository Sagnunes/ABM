<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $this->call(UsersTableSeeder::class);
         $this->call(ModulosTableSeeder::class);
         $this->call(ServicosTableSeeder::class);
         $this->call(FantasmasTableSeeder::class);
         $this->call(AdminFullAcessTableSeeder::class);
    }
}
