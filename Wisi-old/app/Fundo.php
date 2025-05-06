<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fundo extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
