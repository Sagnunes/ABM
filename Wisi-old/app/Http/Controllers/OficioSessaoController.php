<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\OficioSessao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class OficioSessaoController extends Controller
{

    public function index(){
        return view('extras.oficiosessao.index')->with('results',OficioSessao::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.oficiosessao.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            OficioSessao::create([
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
        return view('extras.oficiosessao.edit')->with('results',OficioSessao::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = OficioSessao::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('oficiosessao.index');
    }

    public function destroy($id)
    {
        $registo = OficioSessao::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
