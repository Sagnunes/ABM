<?php

namespace App\Http\Controllers;

use App\Cartorio;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartorioController extends Controller
{
    public function index(){
        return view('extras.cartorio.index')->with('results',Cartorio::orderBy('nome')->get());
    }
    public function create(){
        return view('extras.cartorio.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Cartorio::create([
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
            return view('extras.cartorio.edit')->with('results',Cartorio::where('slug',$slug)->first());
        }

    public function update(ExtraFormValidation $request , $id){

        try {
            $registo = Cartorio::find($id);
            $registo->nome = $request->nome;
            $registo->slug = str_slug($request->nome);
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('cartorio.index');
    }
    public function destroy($id)
    {
        $registo = Cartorio::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
