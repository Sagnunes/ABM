<?php

namespace App\Http\Controllers;

use App\Destino;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class DestinoController extends Controller
{
    public function index(){
        return view('extras.destino.index')->with('results',Destino::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.destino.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Destino::create([
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
        return view('extras.destino.edit')->with('results',Destino::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Destino::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('destino.index');
    }

    public function destroy($id)
    {
        $registo = Destino::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
