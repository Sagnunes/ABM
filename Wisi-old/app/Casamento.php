<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Auth;
class Casamento extends Model
{
    protected $fillable = [
        'localParoquial_id','data','folha','numero','livro','marido','mulher',
        'maeMarido','paiMarido','maeMulher','paiMulher','observacao','user_id','id','nRegisto','updated_user_id'
    ];
    public $incrementing = false;
    protected $guarded = ['id'];

    public function localParoquial(){return $this->belongsTo('App\LocalParoquial','localParoquial_id');}


    public function scopesearchIntoDatabaseWithParameters($query,$data_from_view)
    {
        $construcao = array();

        $construcao = $this->isDataFromViewNotEmptyAndBuildArray($data_from_view, $construcao);

        $query = DB::table('view_casamentos');

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
    public function isDataFromViewNotEmptyAndBuildArray($data_from_view, $construcao): array
    {
        if (!empty($data_from_view['nRegisto']))
            $construcao[] = array(
                'nRegisto', 'like', '%' . $data_from_view['nRegisto'] . '%'
            );

        if (!empty($data_from_view['marido']))

            $construcao[] = array(
                'marido', 'like', '%' . str_replace(' ', '%', $data_from_view['marido']) . '%'
            );
        if (!empty($data_from_view['mulher']))
            $construcao[] = array(
                'mulher', 'like', '%' . str_replace(' ', '%', $data_from_view['mulher']) . '%'
            );
        if (!empty($data_from_view['paiMarido']))
            $construcao[] = array(
                'paiMarido', 'like', '%' . str_replace(' ', '%', $data_from_view['paiMarido']) . '%'
            );
        if (!empty($data_from_view['maeMarido']))
            $construcao[] = array(
                'maeMarido', 'like', '%' . str_replace(' ', '%', $data_from_view['maeMarido']) . '%'
            );
        if (!empty($data_from_view['paiMulher']))
            $construcao[] = array(
                'paiMulher', 'like', '%' . str_replace(' ', '%', $data_from_view['paiMulher']) . '%'
            );
        if (!empty($data_from_view['maeMulher']))
            $construcao[] = array(
                'maeMulher', 'like', '%' . str_replace(' ', '%', $data_from_view['maeMulher']) . '%'
            );
        if (!empty($data_from_view['data']))
            $construcao[] = array(
                'data', 'like', '%' . $data_from_view['data'] . '%'
            );
        if (!empty($data_from_view['local']))
            $construcao[] = array(
                'localParoquial_id', '=', $data_from_view['local']
            );
        if (!empty($data_from_view['observacao']))
            $construcao[] = array(
                'observacao', 'like', '%' . str_replace(' ', '%', $data_from_view['observacao']) . '%'
            );
        if (!empty($data_from_view['livro']))
            $construcao[] = array(
                'livro', 'like', '%' . $data_from_view['livro'] . '%'
            );
        if (!empty($data_from_view['folha']))
            $construcao[] = array(
                'folha', 'like', '%' . $data_from_view['folha'] . '%'
            );
        return $construcao;
    }
}
