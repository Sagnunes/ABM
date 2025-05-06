<?php

use Illuminate\Database\Seeder;

class ModulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Modulos::create([
            'nome'=>'Nascimentos',
            'slug'=>str_slug('Nascimentos')
        ]);
        App\Modulos::create([
            'nome'=>'Casamentos',
            'slug'=>str_slug('Casamentos')
        ]);
        App\Modulos::create([
            'nome'=>'Notáriais',
            'slug'=>str_slug('Notáriais')
        ]);
        App\Modulos::create([
            'nome'=>'Passaportes',
            'slug'=>str_slug('Passaportes')
        ]);
        App\Modulos::create([
            'nome'=>'CMFUN',
            'slug'=>str_slug('CMFUN')
        ]);
        App\Modulos::create([
            'nome'=>'Processo de obras',
            'slug'=>str_slug('Processo de obras')
        ]);
        App\Modulos::create([
            'nome'=>'Sucessões e doações',
            'slug'=>str_slug('Sucessões e doações')
        ]);
        App\Modulos::create([
            'nome'=>'Judicial',
            'slug'=>str_slug('Judicial')
        ]);
        App\Modulos::create([
            'nome'=>'Óbitos',
            'slug'=>str_slug('Óbitos')
        ]);
        App\Modulos::create([
            'nome'=>'Aprovisionamento',
            'slug'=>str_slug('Gestão Aprovisionamento')
        ]);
        App\Modulos::create([
            'nome'=>'Deposito',
            'slug'=>str_slug('Gestão Deposito')
        ]);
        App\Modulos::create([
            'nome'=>'Marca de água',
            'slug'=>str_slug('Marca de água')
        ]);
        App\Modulos::create([
            'nome'=>'Assiduidade',
            'slug'=>str_slug('Gestão Assiduidade')
        ]);
        App\Modulos::create([
            'nome'=>'Administração',
            'slug'=>str_slug('Administração')
        ]);
        App\Modulos::create([
            'nome'=>'Emolumento',
            'slug'=>str_slug('Emolumento')
        ]);
        App\Modulos::create([
            'nome'=>'Salas',
            'slug'=>str_slug('Salas')
        ]);
        App\Modulos::create([
            'nome'=>'Notícias',
            'slug'=>str_slug('Notícias')
        ]);
        App\Modulos::create([
            'nome'=>'Requisições',
            'slug'=>str_slug('Requisições')
        ]);
    }
}
