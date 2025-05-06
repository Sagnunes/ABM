<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use App\TipologiaJudicial as TipologiaJudicialModel;
use Illuminate\Support\Facades\Session;

class TipologiaJudicialController extends Controller
{
    public function index(){
        return view('extras.tipologiajudicial.index')->with('results',TipologiaJudicialModel::orderBy('nome')->get());
    }

    public function create(){
        return view('extras.tipologiajudicial.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            TipologiaJudicialModel::create([
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
        return view('extras.tipologiajudicial.edit')->with('results',TipologiaJudicialModel::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = TipologiaJudicialModel::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('tipologiajudicial.index');
    }
    public function destroy($id)
    {
        $registo = TipologiaJudicialModel::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
