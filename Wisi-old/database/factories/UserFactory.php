<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
        'validacao'=>0
    ];
});
$factory->define(App\Nascimento::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'pai'=>$faker->name,
        'mae'=>$faker->name,
        'livro'=>$faker->numberBetween(1,20),
        'filho'=>$faker->name,
        'nRegisto'=>$faker->numberBetween(1,50),
        'localParoquial_id'=>$faker->numberBetween(1,10),
        'data'=>$faker->date('Y-m-d'),
        'folha'=>$faker->numberBetween(1,20),
        'user_id'=>1
    ];
});

$factory->define(App\Casamento::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'numero'=>$faker->numberBetween(1,50),
        'marido'=>$faker->name,
        'mulher'=>$faker->name,
        'maeMarido'=>$faker->name,
        'nRegisto'=>$faker->numberBetween(1,50),
        'paiMarido'=>$faker->name,
        'maeMulher'=>$faker->name,
        'paiMulher'=>$faker->name,
        'livro'=>$faker->numberBetween(1,20),
        'localParoquial_id'=>$faker->numberBetween(1,10),
        'data'=>$faker->date('Y-m-d'),
        'folha'=>$faker->numberBetween(1,20),
        'user_id'=>2
    ];
});

$factory->define(App\Notoriais::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'livro'=>$faker->randomDigitNotNull,
        'cotaAntiga'=>$faker->hexcolor,
        'folha'=>$faker->randomDigitNotNull ,
        'outorgante'=>$faker->name,
        'objTrans'=>$faker->name,
        'tipologiaNotario_id'=>$faker->numberBetween(1,10),
        'notario_id'=>$faker->numberBetween(1,10),
        'cartorio_id'=>$faker->numberBetween(1,10),
        'data'=>$faker->date('Y-m-d'),
        'user_id'=>1
    ];
});
$factory->define(App\cmfunchal::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'dataInicial'=>$faker->date('Y-m-d'),
        'dataFinal'=>$faker->date('Y-m-d'),
        'cota'=>$faker->randomDigitNotNull ,
        'codRef'=>$faker->randomDigitNotNull,
        'dimSuporte'=>$faker->randomDigitNotNull,
        'nivelDescricao'=>$faker->name,
        'areaOrgFunc_id'=>$faker->numberBetween(1,10),
        'serieSubserie'=>$faker->name,
        'tituloOriginal'=>$faker->name,
        'titulo'=>$faker->name,
        'ambitoConteudo'=>$faker->name,
        'estadoConservacao'=>'mau',
        'fundo_id'=>$faker->numberBetween(1,10),
        'user_id'=>1
    ];
});
$factory->define(App\Judicial::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'dataInicial'=>$faker->date('Y-m-d'),
        'dataFinal'=>$faker->date('Y-m-d'),
        'autor'=>$faker->name,
        'reu'=>$faker->name,
        'ano'=>$faker->year,
        'caixa'=>$faker->randomDigitNotNull,
        'numero'=>$faker->randomDigitNotNull,
        'numeroProcesso'=>$faker->randomDigitNotNull,
        'assuntos'=>$faker->name,
        'anexo'=>$faker->name,
        'observacao'=>$faker->name,
        'freguesia_id'=>$faker->numberBetween(1,10),
        'tribunal_id'=>$faker->numberBetween(1,10),
        'varaJuizo_id'=>$faker->numberBetween(1,10),
        'classificacao_id'=>$faker->numberBetween(1,10),
        'oficioSessao_id'=>$faker->numberBetween(1,10),
        'tipologiaJudicial_id'=>$faker->numberBetween(1,10),
        'municipio_id'=>$faker->numberBetween(1,10),
        'user_id'=>1
    ];
});
$factory->define(App\ProcessoObra::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'projeto'=>$faker->name,
        'referencia'=>$faker->name,
        'secretaria'=>$faker->name,
        'designacao'=>$faker->name,
        'dataArquivo'=>$faker->date('Y-m-d'),
        'numeroArquivo'=>$faker->numberBetween(0,100),
        'cotaFisica'=>$faker->hexColor,
        'observacao'=>$faker->paragraph,
        'user_id'=>1
    ];
});
$factory->define(App\Obito::class, function (Faker $faker) {
    $random = new \App\Classes\randomID();
    return [
        'id' => $random->generateID(),
        'nome'=>$faker->name,
        'data'=>$faker->date('Y-m-d'),
        'livro'=>$faker->randomDigitNotNull,
        'folha'=>$faker->randomDigitNotNull,
        'numero'=>$faker->randomDigitNotNull,
        'localParoquial_id'=>$faker->numberBetween(1,10),
        'observacao'=>$faker->paragraph,
        'user_id'=>1
    ];
});
$factory->define(App\LocalParoquial::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\CategoriaAcompanhante::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\AreaOrg::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Fundo::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Cartorio::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\TipologiaNotario::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Notario::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});

$factory->define(App\Familia::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Produto::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
        'familia_id'=>1
    ];
});
$factory->define(App\LocalParoquial::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\LocalParoquial::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Tribunal::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\VaraJuizo::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Classificacao::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\OficioSessao::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\TipologiaJudicial::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Municipio::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});
$factory->define(App\Freguesia::class, function (Faker $faker) {
    return [
        'nome' => $faker->name,
    ];
});



