<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\VaraJuizo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class VaraJuizoController extends Controller
{
    public function index(){
        return view('extras.varajuizo.index')->with('results',VaraJuizo::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.varajuizo.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            VaraJuizo::create([
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
        return view('extras.varajuizo.edit')->with('results',VaraJuizo::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = VaraJuizo::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('varajuizo.index');
    }
    public function destroy($id)
    {
        $registo = VaraJuizo::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
