<?php

use Illuminate\Database\Seeder;

class AdminFullAcessTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Define um profile com imagem
        App\Profile::create([
            'user_id'=>1,
            'imagem'=>'storage/uploads/profiles/default.gif',
            'servico_id'=>4
        ]);

        // da acessos a todos os modulos ao utilizador 1
        for ($i=1;$i<=18;$i++){
            App\Acessos::create([
                'user_id'=>1,
                'modulo_id'=>$i,
                'proprios'=>4,
                'outros'=>4
            ]);
        }
    }
}
