<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Municipio extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
