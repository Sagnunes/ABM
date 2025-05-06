<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\Notario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NotarioController extends Controller
{
    public function index(){
        return view('extras.notario.index')->with('results',Notario::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.notario.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Notario::create([
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
        return view('extras.notario.edit')->with('results',Notario::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Notario::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('notario.index');
    }

    public function destroy($id)
    {
        $registo = Notario::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
