<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use App\Acompanhante;
use Auth;
class Passaporte extends Model
{
    protected $fillable = [
        'numeroCaixa','numeroProcesso','ano','mes','numeroPassaporte','requerente',
        'requerentePai','requerenteMae','naturalidade_id','destino_id','idade',
        'dataBatismoNascimento','conjuge','conjugePai','conjugeMae','observacao','user_id','id','updated_user_id','folha','bi',
        'estadoCivil','numeroSaida','cartaPessoal','cartaPessoalQuantidade'
    ];

    public function naturalidade(){return $this->belongsTo('App\Naturalidade','naturalidade_id');}
    public function destino(){return $this->belongsTo('App\Destino','destino_id');}
    public function meses(){return $this->belongsTo('App\Meses','mes');}
    public function acompanhantes(){return $this->hasMany('App\Acompanhante','passaporte_id');}

    public $incrementing = false;

    public function scopeAdvancedSearchQuery($query,$caixa,$processo,$passaporte,$ano,$mes,$destino,$requerente,$pai,$mae,$naturalidade,$conjuge,$obs){
        $construcao = array();

        if (!empty($requerente))
            $construcao[] = array(
                'requerente', 'like', '%'.$requerente.'%'
            );
        if (!empty($processo))
            $construcao[] = array(
                'processo', '=', $processo
            );
        if (!empty($passaporte))
            $construcao[] = array(
                'passaporte', '=', $passaporte
            );
        if (!empty($caixa))
            $construcao[] = array(
                'caixa', '=', $caixa
            );
        if (!empty($conjuge))
            $construcao[] = array(
                'conjuge', 'like', '%'.str_replace(' ','%',$conjuge).'%'
            );
        if (!empty($pai))
            $construcao[] = array(
                'requerentePai', 'like', '%'.str_replace(' ','%',$pai).'%'
            );
        if (!empty($mae))
            $construcao[] = array(
                'requerenteMae', 'like', '%'.str_replace(' ','%',$mae).'%'
            );
        if (!empty($ano))
            $construcao[] = array(
                'ano', 'like', '%'.$ano.'%'
            );
        if (!empty($mes))
            $construcao[] = array(
                'mes', 'like', '%'.$mes.'%'
            );
        if (!empty($destino))
            $construcao[] = array(
                'destino_id', '=', $destino
            );
        if (!empty($naturalidade))
            $construcao[] = array(
                'naturalidade_id', '=', $naturalidade
            );
        if (!empty($obs))
            $construcao[] = array(
                'observacao', 'like', '%'.str_replace(' ','%',$obs).'%'
            );

        $query = DB::table('view_passaportes');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
