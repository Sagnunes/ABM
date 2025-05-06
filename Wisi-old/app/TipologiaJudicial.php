<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipologiaJudicial extends Model
{
    protected $table = 'tipologia_judiciais';
    protected $fillable = ['nome','slug'];
    public $timestamps = false;
}
