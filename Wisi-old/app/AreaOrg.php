<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AreaOrg extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
