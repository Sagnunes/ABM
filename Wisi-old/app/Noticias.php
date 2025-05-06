<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    protected $fillable = ['descricao','titulo','user_id'];
    public function user(){return $this->belongsTo('App\User');}
}
