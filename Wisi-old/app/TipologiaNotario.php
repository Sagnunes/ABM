<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipologiaNotario extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
