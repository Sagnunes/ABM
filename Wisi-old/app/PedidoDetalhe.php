<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedidoDetalhe extends Model
{
    protected $fillable = ['aprosionamento_id','produto_id','quantidade','quantidade_entregue'];
    public $incrementing = false;
    protected $dates = ['created_at'];
    public function produto(){return $this->belongsTo('App\Produto','produto_id');}
}
