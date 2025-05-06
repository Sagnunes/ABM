<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qualidade extends Model
{
    protected $fillable = ['url','grupo','processo_id','titulo','versao','visivel'];

    public function processo(){return $this->belongsTo('App\Processo','processo_id');}
}
