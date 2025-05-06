<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $fillable = ['nome','stock','stock_min','familia_id'];
    public $timestamps = false;
    public function familia(){return $this->belongsTo('App\Familia','familia_id');}

    public function scopeBasicSearchQuery($query,$familia,$produto){

        $construcao = array();


        if (!empty($familia))
            $construcao[] = array(
                'familia_id', '=', $familia
            );
        if (!empty($produto))
            $construcao[] = array(
                'nome', 'like', '%'.str_replace(' ','%',$produto).'%'
            );


        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;

    }
}
