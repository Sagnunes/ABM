<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    protected $table = 'servicos';
    public $timestamps = false;
    protected $fillable = ['nome','sigla','slug'];
}
