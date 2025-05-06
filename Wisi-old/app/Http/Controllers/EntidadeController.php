<?php

namespace App\Http\Controllers;

use App\Entidade;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Session;
class EntidadeController extends Controller
{
    public function index(){
        return view('extras.entidade.index')->with('results',Entidade::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.entidade.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Entidade::create([
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
        return view('extras.entidade.edit')->with('results',Entidade::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Entidade::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('entidade.index');
    }
    public function destroy($id)
    {
        $registo = Entidade::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
