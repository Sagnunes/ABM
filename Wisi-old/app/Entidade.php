<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entidade extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
