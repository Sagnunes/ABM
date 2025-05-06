<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\Servico;
use Illuminate\Http\Request;
use Session;
class ServicoController extends Controller
{
    public function index(){
        return view('extras.servicos.index')->with('results',Servico::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.servicos.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Servico::create([
                'nome'=>$request->nome,
                'sigla'=>$request->sigla,
                'slug'=>str_slug($request->nome)
            ]);

            Session::flash('success','Registo adicionado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi adiconado!');
        }

        return redirect()->back();
    }
    public function edit($slug){
        return view('extras.servicos.edit')->with('results',Servico::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Servico::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('servicos.index');
    }

    public function destroy($id)
    {
        $registo = Servico::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
