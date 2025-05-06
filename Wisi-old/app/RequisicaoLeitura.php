<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicaoLeitura extends Model
{
    public function fundo(){return $this->belongsTo('App\Fundo','fundo_id');}

    public $timestamps = false;

    protected $table = 'requisicao_leitura';

    protected $fillable = ['requerente','data','numero_cartao','titulo','cota','fundo_id'];
}
