<?php

namespace App\Http\Controllers;

use App\Acessos;
use App\Modulos;
use App\User;
use Illuminate\Http\Request;
use Session;
use Auth;

class AcessosController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:14');
    }

    public function show($id){
        return view('forms.acessos.show')
            ->with('user',User::find($id))
            ->with('results',User::AcessosUser($id)->orderBy('modulo')->get());
    }
    public function edit($id){
        return view('forms.acessos.edit')->with('registo',User::findOrFail($id))->with('modulos',Modulos::orderBy('nome')->get());
    }

    public function update(Request $request,$id){
        try{
            $utilizador = User::findOrFail($id);
            for ($i = 0, $iMax = \count($request->acessos); $i < $iMax; $i++) {
                $add = new Acessos();
                $add->user_id = $utilizador->id;
                $add->modulo_id = $request->acessos[$i]['modulo'];
                $add->proprios = $request->acessos[$i]['proprios'];
                $add->outros = $request->acessos[$i]['outros'];
                $add->save();
            }
            Session::flash('success','Atribuição de acessos com sucesso');

        }catch (\Exception $e){
            Session::flash('error','Atribuição de acessos não foi possivel.');
        }
        return redirect()->route('utilizadores.index');
    }
    public function destroy($id)
    {
        $registo = Acessos::find($id);
        $registo->delete();
        Session::flash('success','Acesso foi apagado.');
        return redirect()->route('acessos.show',['id'=>$registo->user_id]);
    }
}
