<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','validacao'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function nascimento(){return $this->hasMany('App\Nascimento');}
    public function profile(){return $this->hasOne('App\Profile');}
    public function acessos(){return $this->hasMany('App\Acessos','user_id');}

    public function scopeProfileDados($query,$id){
        return $query = DB::table('view_users_with_profile')->where('id','=',$id);
    }
    public function scopeAcessosUser($query,$id){
        return $query = DB::table('view_acessos_user')->where('user_id','=',$id);
    }

    public function permissao_modulo($modulo){
        $acesso = Auth::user()->acessos;
        if ($acesso->contains('modulo_id',$modulo))
            if($acesso->where('modulo_id',$modulo))
                return true;
        return false;
    }

    public function permissao_for_template($modulo,$accao)
    {
        $acesso = Auth::user()->acessos;
        if ($acesso->contains('modulo_id', $modulo))
            if ($accao == 1) {
                if ($acesso->where('modulo_id', $modulo)->where('outros', '>=', $accao)->first())
                    return true;
                if ($acesso->where('modulo_id', $modulo)->where('proprios', '>=', $accao)->first())
                    return true;
            }
        if ($accao == 2) {
            if ($acesso->where('modulo_id', $modulo)->where('outros', '>=', $accao)->first())
                return true;
            if ($acesso->where('modulo_id', $modulo)->where('proprios', '>=', $accao)->first())
                return true;
        }
        if ($accao == 3) {
            if ($acesso->where('modulo_id', $modulo)->where('outros', '>=', $accao)->first())
                return true;
            if ($acesso->where('modulo_id', $modulo)->where('proprios', '>=', $accao)->first())
                return true;
        }
        if ($accao == 4) {
            if ($acesso->where('modulo_id', $modulo)->where('outros', '>=', $accao)->first())
                return true;
            if ($acesso->where('modulo_id', $modulo)->where('proprios', '>=', $accao)->first())
                return true;
        }
        return false;
    }

}
