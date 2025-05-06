<?php

namespace App\Http\Controllers;

use App\Acompanhante;
use App\Http\Requests\ExtraFormValidation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AcompanhanteController extends Controller
{
    public function create(){
        return view('extras.categoriaAcompanhante.create');
    }

    public function store(ExtraFormValidation $request){
        try{
            Acompanhante::create([
                'nome'=>$request->nome
            ]);

            Session::flash('success','Registo adicionado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi adiconado!');
        }

        return redirect()->back();
    }
}
