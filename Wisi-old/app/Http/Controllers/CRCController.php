<?php

namespace App\Http\Controllers;

use App\Http\Requests\ExtraFormValidation;
use App\LocalParoquial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CRCController extends Controller
{
    public function index(){
        return view('extras.crc.index')->with('results',LocalParoquial::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.crc.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            LocalParoquial::create([
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
        return view('extras.crc.edit')->with('results',LocalParoquial::where('slug',$slug)->first());
    }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = LocalParoquial::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('crc.index');
    }
    public function destroy($id)
    {
        $registo = LocalParoquial::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
