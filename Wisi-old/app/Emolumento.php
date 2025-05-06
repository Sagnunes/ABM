<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class Emolumento extends Model
{
    protected $fillable=['data','requerente','teorDocumento','nProcesso','livro','cota','registo','folha','ano','pagamento','valor','user_id'];
    protected $guarded=['id'];

    public function scopeBasicSearchQuery($query,$inicial,$final){
        $query = DB::table('view_emolumento')->whereBetween('data', [$inicial, $final]);
        return $query;
    }
    public function user(){return $this->belongsTo('App\User');}

}
