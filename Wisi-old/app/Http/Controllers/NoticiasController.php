<?php

namespace App\Http\Controllers;

use App\Http\Requests\NoticiasFormValidation;
use App\Noticias;
use Illuminate\Http\Request;
use Session;
use Auth;
class NoticiasController extends Controller
{
    public function index(){
        $registo = Noticias::orderBy('created_at','desc')->get();
        return view('forms.noticias.index')->with('results',$registo);
    }
    public function store(NoticiasFormValidation $request){
        try{
            Noticias::create([
                'titulo'=>$request->titulo,
                'descricao'=>$request->descricao
            ]);

            Session::flash('success','Notícia inserida.');

        }catch (\Exception $e){
            Session::flash('error','Notícia não foi devidamente criado.');
        }

        return redirect()->back();
    }
    public function edit($id){
        return view('forms.noticias.edit')
            ->with('registo',Noticias::findOrFail($id));
    }

    public function update(NoticiasFormValidation $request, $id){
        try {
            $registo = Noticias::findOrFail($id);
            $registo->titulo = $request->titulo;
            $registo->descricao = $request->descricao;
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('noticias.index');
    }

    public function destroy($id)
    {
        $registo = Noticias::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

}
