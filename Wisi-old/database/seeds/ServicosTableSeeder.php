<?php

use Illuminate\Database\Seeder;

class ServicosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $servicos = [

           ['GCA','Gestão de Coleções e Acesso'],
           ['SEEC','Serviço Educativo e Extensão Cultural'],
           ['SPRC','Serviço Preservação, Conservação e Resturo'],
           ['SIM','Serviço Informático e Multimédia'],
           ['SAM','Serviço Administrativo e Manutenção'],
           ['GAA - Arquivos','Gestão de Arquivos e Acesso - Arquivos'],
           ['GAA - Leitura e Certidões','Gestão de Arquivos e Acesso - Leitura e Certidões'],

           ];

       for ($i = 0, $iMax = count($servicos); $i < $iMax; $i++)
       {
           App\Servico::create([
              'sigla'=>$servicos[$i][0],
              'nome'=>$servicos[$i][1],
              'slug'=>str_slug($servicos[$i][1])
           ]);
       }
    }
}
