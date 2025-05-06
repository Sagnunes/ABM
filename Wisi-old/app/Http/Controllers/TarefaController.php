<?php

namespace App\Http\Controllers;

use App\Tarefa;
use Illuminate\Http\Request;
use Session;
use Auth;
class TarefaController extends Controller
{
    public function store(Request $request){
        try{
                Tarefa::create([
                    'tarefa'=>encrypt($request->nota),
                    'estado'=>1,
                    'prioridade'=>$request->tag[0],
                    'user_id'=>Auth::user()->id
                ]);
            Session::flash('success','Registo foi criado com sucesso.');

        }catch (\Exception $e){
            Session::flash('error','Registo não foi devidamente criado.');
        }

        return redirect()->back();
    }

    public function completed($id){
        $registo = Tarefa::find($id);
        $registo->delete();
        Session::flash('success','Lembrete concluido');
        return redirect()->route('home');
    }
    public function nullified($id){
        $registo = Tarefa::find($id);
        $registo->delete();
        Session::flash('success','Lembrete cancelado');
        return redirect(url()->previous());
    }
}
