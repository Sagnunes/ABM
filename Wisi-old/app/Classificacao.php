<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classificacao extends Model
{
    protected $table = 'classificacoes';
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
