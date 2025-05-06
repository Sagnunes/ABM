<?php

use Illuminate\Database\Seeder;

class FantasmasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // cria 300 fantasmas.
        for ($i=1;$i<=300;$i++){
            App\Fantasma::create([
                'status'=>0,
            ]);
        }
    }
}
