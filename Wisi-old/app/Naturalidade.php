<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Naturalidade extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
