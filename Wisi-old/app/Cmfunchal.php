<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Cmfunchal extends Model
{
    protected $table = 'cmfunchal';
    protected $fillable = [
        'fundo_id', 'cota', 'codRef', 'dimSuporte', 'areaOrgFunc_id', 'nivelDescricao', 'estadoConservacao', 'serieSubserie',
        'tituloOriginal', 'titulo', 'dataInicial','dataFinal', 'ambitoConteudo', 'observacao','user_id','id','updated_user_id'
    ];
    public $incrementing = false;
    public function fundo(){return $this->belongsTo('App\Fundo','fundo_id');}
    public function areaorg(){return $this->belongsTo('App\AreaOrg','areaOrgFunc_id');}


    public function scopeBasicSearchQuery($query,$area,$titulo,$data){

//        if (Auth::user()->acessos->where('modulo_id','=',5)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        $construcao = array();
        if (!empty($area))

            $construcao[] = array(
                'areaOrgFunc_id', '=', $area
            );
        if (!empty($titulo))
            $construcao[] = array(
                'titulo', 'like', '%'.str_replace(' ','%',$titulo).'%'
            );
        if (!empty($data))
            $construcao[] = array(
                'dataInicial', 'like', '%'.$data.'%'
            );

        $query = DB::table('view_cmfuns');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }

    public function scopeAdvancedSearchQuery($query,$area,$serie,$cota,$codRef,$data,$titulo,$ambito,$estado,$obs){

//        if (Auth::user()->acessos->where('modulo_id','=',5)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        $construcao = array();
        if (!empty($area))
            $construcao[] = array(
                'areaOrgFunc_id', '=', $area
            );
        if (!empty($titulo))
            $construcao[] = array(
                'titulo', 'like', '%'.str_replace(' ','%',$titulo).'%'
            );
        if (!empty($data))
            $construcao[] = array(
                'dataInicial', 'like', '%'.$data.'%'
            );

        if (!empty($serie))
            $construcao[] = array(
                'serieSubserie', 'like', '%'.str_replace(' ','%',$serie).'%'
            );
        if (!empty($cota))
            $construcao[] = array(
                'cota', 'like', '%'.$cota.'%'
            );
        if (!empty($codRef))
            $construcao[] = array(
                'codRef', 'like', '%'.$codRef.'%'
            );
        if (!empty($ambito))
            $construcao[] = array(
                'ambitoConteudo', 'like', '%'.str_replace(' ','%',$ambito).'%'
            );
        if (!empty($estado))
            $construcao[] = array(
                'estadoConservacao', 'like', '%'.str_replace(' ','%',$estado).'%'
            );
        if (!empty($obs))
            $construcao[] = array(
                'observacao', 'like', '%'.str_replace(' ','%',$obs).'%'
            );

        $query = DB::table('view_cmfuns');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
