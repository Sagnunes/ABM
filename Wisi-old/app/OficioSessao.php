<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OficioSessao extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
    protected $table ='oficio_seccao';
}
