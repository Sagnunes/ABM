<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;

class Nascimento extends Model
{
    public function user(){return $this->belongsTo('App\User');}
    public function localParoquial(){return $this->belongsTo('App\LocalParoquial','localParoquial_id');}
    protected $fillable = [
        'data','livro','filho','pai','folha','mae','observacao','user_id','localParoquial_id','id','nRegisto','updated_user_id'
    ];


    protected $guarded = ['id'];
    public $incrementing = false;
    protected $primaryKey = 'id';


    public function scopeLimitResult($query){
        return $query = DB::table('nascimentos')
            ->offset(10)
            ->limit(500)
            ->get();
    }

    public function scopesearchIntoDatabaseWithParameters($query,$data_from_view){


        $construcao = array();

        $construcao = $this->searchQueryConstructor($data_from_view, $construcao);

        $query = DB::table('view_nascimentos');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        
        return $query;
    }

    /**
     * @param $data_from_view
     * @param $construcao
     * @return array
     */
    public function searchQueryConstructor($data_from_view, $construcao): array
    {
        if (!empty($data_from_view['nRegisto']))
            $construcao[] = array(
                'nRegisto', 'like', '%' . $data_from_view['nRegisto'] . '%'
            );
        if (!empty($data_from_view['data']))
            $construcao[] = array(
                'data', 'like', '%' . $data_from_view['data'] . '%'
            );
        if (!empty($data_from_view['local']))
            $construcao[] = array(
                'localParoquial_id', '=', $data_from_view['local']
            );

        if (!empty($data_from_view['livro']))
            $construcao[] = array(
                'livro', 'like', '%' . $data_from_view['livro'] . '%'
            );
        if (!empty($data_from_view['folha']))
            $construcao[] = array(
                'folha', 'like', '%' . $data_from_view['folha'] . '%'
            );
        if (!empty($data_from_view['filho']))
            $construcao[] = array(
                'filho', 'like', '%' . str_replace(' ', '%', $data_from_view['filho']) . '%'
            );
        if (!empty($data_from_view['pai']))
            $construcao[] = array(
                'pai', 'like', '%' . str_replace(' ', '%', $data_from_view['pai']) . '%'
            );
        if (!empty($data_from_view['mae']))
            $construcao[] = array(
                'mae', 'like', '%' . str_replace(' ', '%', $data_from_view['mae']) . '%'
            );
        if (!empty($data_from_view['obs']))
            $construcao[] = array(
                'observacao', 'like', '%' . str_replace(' ', '%', $data_from_view['obs']) . '%'
            );
        return $construcao;
    }
}
