<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Judicial extends Model
{
    protected $table = 'judiciais';
    protected $fillable = [
        'dataInicial','dataFinal','autor','reu','caixa','numero','numeroProcesso','assuntos','anexo',
        'observacao','user_id','tribunal_id','varaJuizo_id','classificacao_id','oficio_seccao_id','tipologiaJudicial_id',
        'municipio_id','freguesia_id','id','ano','updated_user_id'
    ];
    public function freguesia(){return $this->belongsTo('App\Freguesia','freguesia_id');}
    public function tribunal(){return $this->belongsTo('App\Tribunal','tribunal_id');}
    public function varajuizo(){return $this->belongsTo('App\VaraJuizo','varaJuizo_id');}
    public function classificacao(){return $this->belongsTo('App\Classificacao','classificacao_id');}
    public function oficioseccao(){return $this->belongsTo('App\OficioSessao','oficio_seccao_id');}
    public function tipologia(){return $this->belongsTo('App\TipologiaJudicial','tipologiaJudicial_id');}
    public function municipio(){return $this->belongsTo('App\Municipio','municipio_id');}
    protected $guarded =['id'];
    public $incrementing = false;

    public function scopeBasicSearchQuery($query,$reu,$autor,$data,$processo){

        $construcao = array();

//        if (Auth::user()->acessos->where('modulo_id','=',8)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        if (!empty($reu))
            $construcao[] = array(
                'reu', 'like', '%'.str_replace(' ','%',$reu).'%'
            );
        if (!empty($autor))
            $construcao[] = array(
                'autor', 'like', '%'.str_replace(' ','%',$autor).'%'
            );
        if (!empty($processo))
            $construcao[] = array(
                'numeroProcesso', '=', $processo
            );
        if (!empty($data))
            $construcao[] = array(
                'dataInicial', 'like', '%'.$data.'%'
            );
        $query = DB::table('view_judiciais');

        for ($i=0, $iMax = \count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }

        return $query;
    }

    public function scopeAdvancedSearchQuery($query,$processo,$caixa,$data,$autor,$reu,$freguesia,$tribunal,$tipologia,$obs,$classificacao,$oficio,$apensos,$juizo)
    {
//        if (Auth::user()->acessos->where('modulo_id','=',8)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        $construcao = array();
        if (!empty($processo))
            $construcao[] = array(
                'numeroProcesso', '=', $processo
            );
        if (!empty($caixa))
            $construcao[] = array(
                'caixa', '=', $caixa
            );
        if (!empty($data))
            $construcao[] = array(
                'dataInicial', 'like', '%'.$data.'%'
            );
        if (!empty($autor))
            $construcao[] = array(
                'autor', 'like', '%'.str_replace(' ','%',$autor).'%'
            );
        if (!empty($reu))
            $construcao[] = array(
                'reu', 'like', '%'.str_replace(' ','%',$reu).'%'
            );
        if (!empty($apensos))
            $construcao[] = array(
                'anexo', 'like', '%'.str_replace(' ','%',$apensos).'%'
            );
        if (!empty($classificacao))
            $construcao[] = array(
                'classificacao_id', '=', $classificacao
            );
        if (!empty($oficio))
            $construcao[] = array(
                'oficioSessao_id', '=', $oficio
            );
        if (!empty($freguesia))
            $construcao[] = array(
                'freguesia_id', '=', $freguesia
            );
        if (!empty($juizo))
            $construcao[] = array(
                'varaJuizo_id', '=', $juizo
            );
        if (!empty($tribunal))
        $construcao[] = array(
            'tribunal_id', '=', $tribunal
        );
        if (!empty($tipologia))
            $construcao[] = array(
                'tipologia_id', '=', $tipologia
            );
        if (!empty($obs))
            $construcao[] = array(
                'observacao', 'like', '%'.str_replace(' ','%',$obs).'%'
            );
        $query = DB::table('view_judiciais');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
