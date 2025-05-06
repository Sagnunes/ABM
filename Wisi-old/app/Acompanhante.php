<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Passaporte;
class Acompanhante extends Model
{
    protected $fillable = ['nome'];
    public $timestamps = false;
    public $incrementing = false;

    public function categoria_acompanhante(){return $this->belongsTo('App\CategoriaAcompanhante','categoria_id');}
    public function passaportes(){return $this->belongsTo('App\Passaporte');}
}
