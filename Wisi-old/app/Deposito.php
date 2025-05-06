<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class Deposito extends Model
{
    const concluida = 2;
    use Notifiable;
    protected $fillable = [
        'titulo', 'cotaI', 'cotaF', 'totalUI', 'D', 'B', 'E', 'P', 'dataDevolucao', 'observacao','user_id','nRegisto',
        'devolucao','fundo_id','id','fantasma_id','cod_referencia','ultimo_user_id_gestao'
    ];
    protected $guarded = [
        'id'
    ];
    public $incrementing = false;
    public function user(){return $this->belongsTo('App\User','user_id');}
    public function fundo(){return $this->belongsTo('App\Fundo','fundo_id');}
    public function scopeRetriveAllDados(){
        return $query = DB::table('view_deposito')
            ->whereBetween('estado',[1,2])
            ->orderBy('created_at','DESC');
    }
    public function scopeUsersWithDeposito(){
        return $query = DB::table('view_users_with_deposito');
    }

    public function scopeBasicSearchQuery($query,$requisicao,$cota,$fundo,$requisitante,$estado){
        $construcao = array();

        if (!empty($requisicao)){
            $construcao[] = array(
                'cod_referencia','=',$requisicao
            );
        }
        if (!empty($cota)){
            $construcao[] = array(
                'cotaI','like','%'.$cota
            );
        }
        if (!empty($fundo))
            $construcao[] = array(
                'fundo_id','=',$fundo
            );
        if (!empty($requisitante))
            $construcao[] = array(
                'user_id','=',$requisitante
            );
        if (!empty($estado))
            $construcao[] = array(
                'estado','=',$estado
            );

        for ($i=0, $iMax = \count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }

    public function estatistica($query,$inicial,$final){
        return $query = Deposito::whereBetween('created_at',[$inicial,$final])->get();
    }

}
