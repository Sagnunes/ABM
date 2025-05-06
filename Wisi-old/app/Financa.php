<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Financa extends Model
{
    protected $fillable=['id','numeroCaixa','numeroCapilha','numeroProcesso','entidade_id','tipoProcesso','nome','estadoCivil','morada','freguesia_id','dataObito',
        'dataInicial','dataFinal','observacoes','user_id','updated_user_id'];
    public $incrementing = false;


    public function freguesia(){return $this->belongsTo('App\Freguesia','freguesia_id');}
    public function entidade(){return $this->belongsTo('App\EntidadeFinanca','entidade_id');}

    public function scopeSearchIntoDatabaseWithParameters($query,$data){


        $construcao = array();
        if (!empty($data['caixa']))
            $construcao[] = array(
                'caixa', '=', $data['caixa']
            );
        if (!empty($data['capilha']))
            $construcao[] = array(
                'capilha', 'like', '%'.$data['capilha'].'%'
            );
        if (!empty($data['processo']))
            $construcao[] = array(
                'processo', '=', $data['processo']
            );
        if (!empty($data['entidade']))
            $construcao[] = array(
                'entidade_id', '=',$data['entidade']
            );
        if (!empty($data['nome']))
            $construcao[] = array(
                'nome', 'like','%'.$data['nome'].'%'
            );
        if (!empty($data['freguesia']))
            $construcao[] = array(
                'freguesia_id', '=', $data['freguesia']
            );
        if (!empty($data['obito']))
            $construcao[] = array(
                'dataObito','like','%'.$data['obito'].'%'
            );
        if (!empty($data['inicial']))
            $construcao[] = array(
                'dataInicial','like','%'.$data['inicial'].'%'
            );

        $query = DB::table('view_financas');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
