<?php

namespace App\Http\Controllers;

use App\Fundo;
use App\RequisicaoAutorizacao;
use App\RequisicaoLeitura;
use App\RequisicaoReproducao;
use Illuminate\Http\Request;
use Session;
class RequisicoesController extends Controller
{

    public function gestao(){
        //dd(RequisicaoReproducao::where('fundo_id'))
    }
    public function index(){
        return view('layouts.requisicoes')->with('registos',Fundo::all());
    }

    public function storeLeitura(Request $request){
        try{
            $registo = RequisicaoLeitura::create([
                'fundo_id'=>$request->fundo,
                'requerente'=>$request->requerente,
                'numero_cartao'=>$request->numero_cartao,
                'titulo'=>$request->titulo,
                'cota'=>$request->cota
            ]);

            Session::flash('success','Requisição adicionada com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Requisição não foi adicionada.');
        }
        return redirect()->back();
    }

    public function storeReproducao(Request $request){

        try{

            $registo = RequisicaoReproducao::create([
                'fundo_id'=>$request->fundo,
                'requerente'=>$request->requerente,
                'email'=>$request->email,
                'tipo'=>$request->tipo,
                'numero_cartao'=>$request->numero_cartao,
                'titulo'=>$request->titulo,
                'quantidade'=>$request->quantidade,
                'cota'=>$request->cota
            ]);
            Session::flash('success','Requisição adicionada com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Requisição não foi adicionada.');
        }
        return redirect()->back();
    }

    public function storeAutorizacao(Request $request){

        try{
        $registo = RequisicaoAutorizacao::create([
            'requerente'=>$request->requerente,
            'morada'=>$request->morada,
            'telefone'=>$request->telefone,
            'email'=>$request->email,
            'numero_cartao_identificacao'=>$request->numero_cartao_identificacao,
            'tipo_cartao_identificacao'=>$request->tipo_cartao_identificacao,
            'data'=>$request->data,
        ]);

        Session::flash('success','Requisição adicionada com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Requisição não foi adicionada.');
        }
        return redirect(url()->previous());
    }
}
