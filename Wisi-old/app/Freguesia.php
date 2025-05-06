<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freguesia extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
