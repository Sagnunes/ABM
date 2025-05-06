<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalParoquial extends Model
{
    protected $table = 'local_paroquial_conservatoria';
    protected $fillable = ['nome','slug'];
    public $timestamps = false;

    public function casamento(){return $this->hasMany('App\Casamento');}
    public function nascimento(){return $this->hasMany('App\Nascimento');}
}
