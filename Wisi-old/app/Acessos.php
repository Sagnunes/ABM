<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Acessos extends Model
{
    protected $fillable = ['user_id','modulo_id','nivel'];
    public $timestamps = false;
    public function modulo(){return $this->belongsTo('App\Modulos','modulo_id');}
}
