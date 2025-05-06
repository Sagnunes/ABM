<?php

namespace App\Http\Controllers;

use App\Fundo;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FundoController extends Controller
{
    public function index(){
        return view('extras.fundo.index')->with('results',Fundo::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.fundo.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Fundo::create([
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
        return view('extras.fundo.edit')->with('results',Fundo::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Fundo::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('fundo.index');
    }


    public function destroy($id)
    {
        $registo = Fundo::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
