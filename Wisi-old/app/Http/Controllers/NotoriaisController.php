<?php

namespace App\Http\Controllers;

use App\Cartorio;
use App\Casamento;
use App\Classes\randomID;
use App\Http\Requests\NotariaisFormValidation;
use App\Notario;
use App\Notariais;
use App\TipologiaNotario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class NotoriaisController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:3');
        $this->middleware('createPermission:3', ['only' => ['create','store']]);
        $this->middleware('editPermission:3', ['only' => ['edit','update']]);
        $this->middleware('readPermission:3', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:3', ['only' => ['destroy']]);

    }

    public function create(){
        return view('forms.notoriais.create')
            ->with('cartorio',Cartorio::all())
            ->with('notario',Notario::all())
            ->with('tipologia',TipologiaNotario::all());
    }

    public function store(NotariaisFormValidation $request){
        try {
            $random = new randomID();
            $registo = Notariais::create([
                'id' => $random->generateID(),
                'cartorio_id' => $request->cartorio,
                'outorgante' => $request->outorgante,
                'objTrans' => $request->objTrans,
                'notario_id' => $request->notario,
                'tipologiaNotario_id' => $request->tipologia,
                'data' => $request->data,
                'livro' => $request->livro,
                'folha' => $request->folha,
                'cotaAntiga' => $request->cota,
                'outros' => $request->outros,
                'user_id' => Auth::user()->id,
                'observacao' => $request->observacao
            ]);
            Session::flash('success','Registo foi criado com sucesso.');
        } catch (\Exception $e) {
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();
    }

    public function edit($id){
        return view('forms.notoriais.edit')
            ->with('registo',Notariais::findOrFail($id))
            ->with('cartorio',Cartorio::all())
            ->with('notario',Notario::all())
            ->with('tipologia',TipologiaNotario::all());
    }
    public function update(NotariaisFormValidation $request, $id){
//        TODO: Acabar de colocar campo "outros"
        $url = $request->input('url');
        try {
            $registo = Notariais::findOrFail($id);
            $registo->data = $request->data;
            $registo->livro = $request->livro;
            $registo->cotaAntiga = $request->cota;
            $registo->folha = $request->folha;
            $registo->outros = $request->outros;
            $registo->outorgante = $request->outorgante;
            $registo->objTrans = $request->objTrans;
            $registo->observacao = $request->observacao;
            $registo->updated_user_id = Auth::user()->id;
            $registo->tipologiaNotario_id = $request->tipologia;
            $registo->notario_id = $request->notario;
            $registo->cartorio_id = $request->cartorio;
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect($url);
    }

    public function basicSearchForm(){

        return view('forms.notoriais.basic-search')
            ->with('cartorio',Cartorio::all())
            ->with('notario',Notario::all())
            ->with('tipologia',TipologiaNotario::all());
    }

    public function basicSearch(Request $request){
          if (empty($request->data) && empty($request->outorgante) && empty($request->objeto)){
              Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
              return redirect()->back();
          }

        $query = Notariais::BasicSearchQuery($request->data,$request->outorgante,$request->objeto)->orderBy('folha')->limit(200)->get();

        if ($query->count() >0)
            return view('forms.notoriais.index')->with('results',$query);

        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }
    public function advancedSearchForm(){

        return view('forms.notoriais.advanced-search')
            ->with('cartorio',Cartorio::all())
            ->with('notario',Notario::all())
            ->with('tipologia',TipologiaNotario::all());
    }
    public function advancedSearch(Request $request){

            if (empty($request->cartorio) && empty($request->tipologia)
                && empty($request->data) && empty($request->livro) && empty($request->cota) && empty($request->outorgante) && empty($request->objTrans) && empty($request->observacao) && empty($request->outros)){
                Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
                return redirect()->back();
            }
        $query = Notariais::AdvancedSearchQuery($request->data,$request->cartorio,$request->tipologia,$request->outorgante,
            $request->objTrans,$request->cota,$request->livro,$request->observacao,$request->outros)->orderBy('folha')->limit(200)->get();

        if ($query->count() >0)
            return view('forms.notoriais.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $registo = Notariais::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
