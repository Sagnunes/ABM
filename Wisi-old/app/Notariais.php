<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Notariais extends Model
{
    protected $fillable = [
        'data', 'livro', 'cotaAntiga', 'folha', 'outorgante', 'local', 'objTrans',
        'observacao', 'user_id', 'tipologiaNotario_id', 'notario_id', 'cartorio_id', 'id','updated_user_id','outros'
    ];

    protected $guarded = ['id'];
    public $incrementing = false;
    public function cartorio(){return $this->belongsTo('App\Cartorio','cartorio_id');}
    public function tipologia(){return $this->belongsTo('App\TipologiaNotario','tipologiaNotario_id');}
    public function notario(){return $this->belongsTo('App\Notario','notario_id');}

    public function scopeBasicSearchQuery($query,$data,$outorgante,$objeto){
        $construcao = array();

//        if (Auth::user()->acessos->where('modulo_id','=',3)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        if (!empty($data))
            $construcao[] = array(
                'data', 'like', '%'.$data.'%'
            );
        if (!empty($outorgante))
            $construcao[] = array(
                'outorgante', 'like', '%'.str_replace(' ','%',$outorgante).'%'
            );
        if (!empty($objeto))
            $construcao[] = array(
                'objTrans', 'like', '%'.str_replace(' ','%',$objeto).'%'
            );

        $query = DB::table('view_notariais');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }



    public function scopeAdvancedSearchQuery($query,$data,$cartorio,$tipologia,$outorgante,$objeto,$cota,$livro,$obs,$outros){
        $construcao = array();

//        if (Auth::user()->acessos->where('modulo_id','=',3)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        if (!empty($data))
            $construcao[] = array(
                'data', 'like', '%'.$data.'%'
            );
        if (!empty($outorgante))
            $construcao[] = array(
                'outorgante', 'like', '%'.str_replace(' ','%',$outorgante).'%'
            );
        if (!empty($objeto))
            $construcao[] = array(
                'objTrans', 'like', '%'.str_replace(' ','%',$objeto).'%'
            );
        if (!empty($outros))
            $construcao[] = array(
                'outros', 'like', '%'.str_replace(' ','%',$outros).'%'
            );
        if (!empty($cartorio))
            $construcao[] = array(
                'cartorio_id', '=', $cartorio
            );
        if (!empty($tipologia))
            $construcao[] = array(
                'tipologiaNotario_id', '=', $tipologia
            );
        if (!empty($cota))
            $construcao[] = array(
                'cotaAntiga', 'like', '%'.$cota.'%'
            );
        if (!empty($livro))
            $construcao[] = array(
                'livro', 'like', '%'.$livro.'%'
            );
        if (!empty($obs))
            $construcao[] = array(
                'observacao', 'like', '%'.str_replace(' ','%',$obs).'%'
            );

        $query = DB::table('view_notariais');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
