<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tribunal extends Model
{
    protected $table = 'tribunais';
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
