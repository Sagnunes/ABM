<?php

namespace App\Http\Controllers;

use App\Classificacao;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ClassificacaoController extends Controller
{
    public function index(){
        return view('extras.classificacao.index')->with('results',Classificacao::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.classificacao.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Classificacao::create([
                'nome'=>$request->nome,
                'slug'=>str_slug($request->nome)
            ]);

            Session::flash('success','Registo adicionado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi adiconado!');
        }

        return redirect()->back();
    }
    public function edit($slug){
        return view('extras.classificacao.edit')->with('results',Classificacao::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Classificacao::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('classificacao.index');
    }

    public function destroy($id)
    {
        $registo = Classificacao::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
