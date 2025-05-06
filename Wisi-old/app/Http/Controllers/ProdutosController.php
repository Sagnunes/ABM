<?php

namespace App\Http\Controllers;

use App\Familia;
use App\Http\Requests\ProdutoFormValidation;
use App\Produto;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProdutosController extends Controller
{
    public function create(){
        return view('forms.produtos.create')->with('familias',Familia::orderBy('nome')->get());
    }
    public function edit($id){
       $registo = Produto::find($id);
        return view('forms.produtos.edit')->with('registo',$registo)->with('familias',Familia::orderBy('nome')->get());
    }

   public function store(ProdutoFormValidation $request){
        try{
            $registo = Produto::create([
                'nome'=>$request->nome,
                'familia_id'=>$request->familia,
                'stock'=>$request->stock,
                'sotck_min'=>$request->stock_minimo
            ]);
            Session::flash('success','Registo foi criado com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Registo não foi devidamente criado.');
        }
       return redirect()->route('produto.create');
   }

    public function update(ProdutoFormValidation $request,$id){
        $url = $request->input('url');
        try{
            $registo = Produto::findOrFail($id);
            $registo->nome = $request->nome;
            $registo->familia_id = $request->familia;
            $registo->stock = $request->stock;
            $registo->stock_min = $request->stock_minimo;
            $registo->save();
            Session::flash('success','Produto - '.$registo->nome.' foi editado com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Registo não foi editado.');
        }
        return redirect($url);
    }

    public function destroy($id){
        $registo = Produto::findOrFail($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect()->back();
    }
    public function basicSearchForm(){

        return view('forms.produtos.basic-search')->with('familias',Familia::orderBy('nome','asc')->get());
    }


    public function basicSearch(Request $request){

        if (empty($request->familia) && empty($request->produto)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->route('produto.basicSearchForm');
        }


        $query = Produto::BasicSearchQuery($request->familia,$request->produto)->
        orderBy('nome')->limit(300)->get();
        if ($query->count() >0)
            return view('forms.produtos.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect(url()->previous());
        }

    }
}
