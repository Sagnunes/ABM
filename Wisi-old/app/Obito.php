<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Obito extends Model
{
    public function localparoquial(){return $this->belongsTo('App\LocalParoquial','localParoquial_id');}
    protected $fillable = [
        'localParoquial_id','nome','data','livro','folha','numero','observacao','user_id','id','estadoCivil','pai','mae','nRegisto','conjuge'
    ];

    protected $guarded = [
        'id'
    ];
    public $incrementing = false;


    public function scopeAdvancedSearchQuery($query,$data){

        $construcao = array();
        if (!empty($data['local']))
            $construcao[] = array(
                'localParoquial_id', '=', $data['local']
            );
        if (!empty($data['data']))
            $construcao[] = array(
                'data', 'like', '%'.$data['data'].'%'
            );
        if (!empty($data['falecido']))
            $construcao[] = array(
                'nome', 'like', '%'.str_replace(' ','%',$data['falecido']).'%'
            );
        if (!empty($data['livro']))
            $construcao[] = array(
                'livro', 'like', '%'.$data['livro'].'%'
            );
        if (!empty($data['folha']))
            $construcao[] = array(
                'folha', 'like', '%'.$data['folha'].'%'
            );
        if (!empty($data['pai']))
            $construcao[] = array(
                'paiFalecido', 'like', '%'.str_replace(' ','%',$data['pai']).'%'
            );
        if (!empty($data['pai']))
            $construcao[] = array(
                'maeFalecido', 'like', '%'.str_replace(' ','%',$data['mae']).'%'
            );
        if (!empty($data['obs']))
            $construcao[] = array(
                'observacao', 'like', '%'.str_replace(' ','%',$data['obs']).'%'
            );


        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
