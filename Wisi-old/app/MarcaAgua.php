<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class MarcaAgua extends Model
{
    protected $fillable = ['tema','subTema','cota','resumo','fundo_id','data','folio','descricao','imagem','user_id','id','updated_user_id'];
    public function fundo(){return $this->belongsTo('App\Fundo','fundo_id');}
    protected $guarded = ['id'];
    public $incrementing = false;

    public function scopeRetrieveAllData($query){
        return $query = DB::table('view_marca_agua');
    }

    public function scopeBasicSearchQuery($query,$tema,$cota,$fundo,$data){

//        if (Auth::user()->acessos->where('modulo_id','=',12)->where('outros','<',1)->first()){
//            $construcao[] = array(
//                'user_id', '=', Auth::user()->id
//            );
//        }
        $construcao = array();
        if (!empty($tema))
            $construcao[] = array(
                'tema', 'like', '%'.str_replace(' ','%',$tema).'%'
            );
        if (!empty($cota))
            $construcao[] = array(
                'cota', 'like', '%'.str_replace(' ','%',$cota).'%'
            );
        if (!empty($fundo))
            $construcao[] = array(
                'fundo_id', 'like', '%'.str_replace(' ','%',$fundo).'%'
            );
        if (!empty($data))
            $construcao[] = array(
                'data', 'like', '%'.$data.'%'
            );

        $query = DB::table('view_marca_agua');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
