<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
class assiduidades extends Model
{
protected $fillable=['time','eventtext','device_no','user_id'];
protected $guarded=['id'];
public function scopeBasicsSearchQuery($query,$dataI,$dataF,$device_no){
	$query = DB::table('registoAssiduidade')->whereBetween('datahora',[$dataI,$dataF])->where('cartao','=',
		$device_no);

return $query;
}
public function scopeNrCartao($query){
$query = DB::table('nrcartao');
//dd($query);
return $query;
}
}