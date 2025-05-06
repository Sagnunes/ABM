<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaraJuizo extends Model
{
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
