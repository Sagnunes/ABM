<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Modulos extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
