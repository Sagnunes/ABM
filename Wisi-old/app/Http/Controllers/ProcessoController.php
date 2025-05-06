<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Processo;
use Session;
use App\Http\Requests\ExtraFormValidation;
class ProcessoController extends Controller
{
    public function index(){
        return view('extras.processos.index')->with('results',Processo::orderBy('tipo')->get());
    }

    public function create(){
        return view('extras.processos.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Processo::create([
                'tipo'=>$request->nome
            ]);

            Session::flash('success','Registo adicionado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi adiconado!');
        }

        return redirect()->back();
    }
    public function edit($id){
        return view('extras.processos.edit')->with('results',Processo::find($id));
    }

    public function update(ExtraFormValidation $request , $id){
        try {
            $registo = Processo::find($id);
            $registo->tipo = $request->nome;
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('processo.index');
    }
    public function destroy($id)
    {
        $registo = Processo::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
