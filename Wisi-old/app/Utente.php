<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Utente extends Model
{
    protected $fillable = ['nLeitor','user_id','local'];
    public $timestamps =false;

    public function scopeBasicSearchQuery($query,$data,$local){
        if (!empty($data))
            $construcao[] = array(
                'created_at', 'like', '%'.$data.'%'
            );
        if (!empty($local))
            $construcao[] = array(
                'local', '=', $local
            );

        $query = DB::table('utentes');

        for ($i=0, $iMax = count($construcao); $i< $iMax; $i++){
            $query->where($construcao[$i][0],$construcao[$i][1],$construcao[$i][2]);
        }
        return $query;
    }
}
