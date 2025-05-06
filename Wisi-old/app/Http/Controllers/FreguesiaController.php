<?php

namespace App\Http\Controllers;

use App\Freguesia;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FreguesiaController extends Controller
{
    public function index(){
        return view('extras.freguesia.index')->with('results',Freguesia::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.freguesia.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Freguesia::create([
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
        return view('extras.freguesia.edit')->with('results',Freguesia::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Freguesia::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('freguesia.index');
    }

    public function destroy($id)
    {
        $registo = Freguesia::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
