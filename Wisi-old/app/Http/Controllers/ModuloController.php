<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\Modulos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\AssignOp\Mod;

class ModuloController extends Controller
{
    public function index(){
        return view('extras.modulo.index')->with('results',Modulos::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.modulo.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Modulos::create([
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
        return view('extras.modulo.edit')->with('results',Modulos::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Modulos::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('modulo.index');
    }

    public function destroy($id)
    {
        $registo = Modulos::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
