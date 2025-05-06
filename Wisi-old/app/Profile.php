<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class   Profile extends Model
{
    public function user(){return $this->hasOne('App\User');}
    protected $fillable = ['categoria_profissional','morada','telefone','user_id','cdp','imagem','local'];
    public $timestamps = false;

    public function servico(){return $this->belongsTo('App\Servico','servico_id');}
}
