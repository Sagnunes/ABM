<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destino extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
