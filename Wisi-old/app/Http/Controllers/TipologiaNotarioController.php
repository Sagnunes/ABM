<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\TipologiaNotario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TipologiaNotarioController extends Controller
{
    public function index(){
        return view('extras.tipologianotario.index')->with('results',TipologiaNotario::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.tipologianotario.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            TipologiaNotario::create([
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
        return view('extras.tipologianotario.edit')->with('results',TipologiaNotario::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = TipologiaNotario::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('tipologianotario.index');
    }

    public function destroy($id)
    {
        $registo = TipologiaNotario::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
