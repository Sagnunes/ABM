<?php

namespace App\Http\Controllers;

use App\CategoriaAcompanhante;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriaAcompanhanteController extends Controller
{
    public function index(){
        return view('extras.categoriaAcompanhante.index')->with('results',CategoriaAcompanhante::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.categoriaAcompanhante.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            CategoriaAcompanhante::create([
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
        return view('extras.categoriaAcompanhante.edit')->with('results',CategoriaAcompanhante::where('slug',$slug)->first());
    }
    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = CategoriaAcompanhante::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('categoriaAcompanhante.index');
    }

    public function destroy($id)
    {
        $registo = CategoriaAcompanhante::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
