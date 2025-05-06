<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequisicaoAutorizacao extends Model
{
    public $timestamps = false;
    protected $table = 'requisicao_autorizacao';
    protected $fillable = ['requerente','morada','telefone','email','numero_cartao_identificacao','tipo_cartao_identificacao','data'];
}
