<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicaoReproducao extends Model
{
    protected $table = 'requisicao_reproducao';
    public $timestamps = false;
    protected $fillable = ['requerente','numero_cartao','data','titulo','cota','fundo_id','tipo','quantidade'];
}
