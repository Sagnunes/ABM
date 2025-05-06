<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;
class Aprovisionamento extends Model
{
    use Notifiable;
    protected $fillable = ['estado','observacao','user_id','quantidade_entregue'];

    protected $dates = ['created_at'];

    public function user(){return $this->belongsTo('App\User','user_id');}
    public function scopeRetriveAllDados(){
        return $query = DB::table('view_aprosionamento');
    }

    public function scopeDetalhesForNotification($query,$id){
        return $query = DB::table('view_pedido_detalhes')
            ->where('id','=',$id);
    }
    public function scopeDetalhesForChangeEntregueQuantidade($query){
        return $query = DB::table('view_pedido_detalhes_for_change_quantidade');
    }
    public function scopeAprosiomamentoIDForEntregue($query,$id){
        return $query = DB::table('view_pedido_detalhes')
            ->where('id','=',$id);
    }
    public function scopeUsersWithAprosionamento(){
        return $query = DB::table('view_users_with_aprosionamento');
    }

    public function scopeBasicSearchQuery($query,$utilizador,$estado,$data,$produto){
        // dd(DB::table('view_aprosionamento')->where('user_id','=',$utilizador)->get());
        $construcao = array();

        if (!empty($estado)){
            $construcao[] = array(
                'estado','=',$estado
            );
        }
        if (!empty($utilizador))
            $construcao[] = array(
                'user_id','=',$utilizador
            );
        if (!empty($data))
            $construcao[] = array(
                'created_at','like','%'.$data.'%'
            );

        if (!empty($produto))
            $construcao[] = array(
                'pedido','like','%'.$produto.'%'
            );

        $query = DB::table('view_aprosionamento');

        for ($i=0, $iMax = \count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
            //dd($query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2])->get());
        }
        return $query;
    }
}