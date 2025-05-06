<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\Naturalidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NaturalidadeController extends Controller
{
    public function index(){
        return view('extras.naturalidade.index')->with('results',Naturalidade::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.naturalidade.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Naturalidade::create([
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
        return view('extras.naturalidade.edit')->with('results',Naturalidade::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Naturalidade::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('naturalidade.index');
    }

    public function destroy($id)
    {
        $registo = Naturalidade::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
