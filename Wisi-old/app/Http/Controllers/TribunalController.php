<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\Tribunal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class TribunalController extends Controller
{
    public function index(){
        return view('extras.tribunal.index')->with('results',Tribunal::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.tribunal.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Tribunal::create([
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
        return view('extras.tribunal.edit')->with('results',Tribunal::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Tribunal::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('tribunal.index');
    }
    public function destroy($id)
    {
        $registo = Tribunal::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
