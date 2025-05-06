<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class ProcessoObra extends Model
{
    protected $fillable = [
        'entidade_id', 'objeto', 'concelho', 'freguesia_id', 'sitio', 'localizacao', 'tipo_obra','data','volume','cota','numero_documento','numero_projeto', 'observacao', 'user_id','id','updated_user_id'
    ];

    public function entidade(){return $this->belongsTo('App\Entidade','entidade_id');}
    public function freguesia(){return $this->belongsTo('App\Freguesia','freguesia_id');}

    protected $guarded =['id'];

    public $incrementing = false;

    public function scopeAdvancedSearchQuery($query,$data){

        $construcao = array();

        if (!empty($data['cota']))
            $construcao[] = array(
                'cota', '=', $data['cota']
            );
        if (!empty($data['documento']))
            $construcao[] = array(
                'documento', '=', $data['documento']
            );
        if (!empty($data['projeto']))
            $construcao[] = array(
                'projeto', 'like', '%'.$data['projeto'].'%'
            );
        if (!empty($data['entidade']))
            $construcao[] = array(
                'entidade_id', '=', $data['entidade']
            );
        if (!empty($data['data']))
            $construcao[] = array(
                'data', 'like', '%'.$data['data'].'%'
            );
        if (!empty($data['tipo_obra']))
            $construcao[] = array(
                'tipo_obra', 'like', '%'.$data['tipo_obra'].'%'
            );
        if (!empty($data['objeto']))
            $construcao[] = array(
                'objeto', 'like', '%'.$data['objeto'].'%'
            );
        if (!empty($data['freguesia']))
            $construcao[] = array(
                'freguesia_id', '=', $data['freguesia']
            );
        if (!empty($data['sitio']))
            $construcao[] = array(
                'sitio', 'like', '%'.$data['sitio'].'%'
            );
        if (!empty($data['observacao']))
            $construcao[] = array(
                'observacao', 'like', '%'.$data['observacao'].'%'
            );
        $query = DB::table('view_processo_obras');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
