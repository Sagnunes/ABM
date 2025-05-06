<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CategoriaAcompanhante extends Model
{
    protected $fillable =['nome','slug'];
    public $timestamps = false;
}
