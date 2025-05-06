<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notario extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
