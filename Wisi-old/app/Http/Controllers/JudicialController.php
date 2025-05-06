<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\Classificacao;
use App\Freguesia;
use App\Http\Requests\JudicialFormValidation;
use App\Judicial;
use App\OficioSessao;
use App\TipologiaJudicial;
use App\Tribunal;
use App\VaraJuizo;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class JudicialController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:8');
        $this->middleware('createPermission:8', ['only' => ['create','store']]);
        $this->middleware('editPermission:8', ['only' => ['edit','update']]);
        $this->middleware('readPermission:8', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:8', ['only' => ['destroy']]);

    }
    public function create(){
        return view('forms.judicial.create')
            ->with('tribunal',Tribunal::orderBy('nome')->get())
            ->with('juizo',VaraJuizo::orderBy('nome')->get())
            ->with('classificacao',Classificacao::orderBy('nome')->get())
            ->with('oficio',OficioSessao::orderBy('nome')->get())
            ->with('tipologia',TipologiaJudicial::orderBy('nome')->get())
            ->with('freguesia',Freguesia::orderBy('nome')->get());
    }

    public function store(JudicialFormValidation $request){
        $random = new randomID();
        try{
            $dados = Judicial::create([
                'id'=>$random->generateID(),
                'dataInicial'=>$request->dataInicial,
                'dataFinal'=>$request->dataFinal,
                'autor'=>$request->autor,
                'reu'=>$request->reu,
                'caixa'=>$request->caixa,
                'numero'=>$request->numero,
                'numeroProcesso'=>$request->numeroProcesso,
                'assuntos'=>$request->assuntos,
                'anexo'=>$request->apensos,
                'observacao'=>$request->observacao,
                'freguesia_id'=>$request->freguesia,
                'tribunal_id'=>$request->tribunal,
                'varaJuizo_id'=>$request->juizo,
                'classificacao_id'=>$request->classificacao,
                'oficio_seccao_id'=>$request->oficio,
                'tipologiaJudicial_id'=>$request->tipologia,
                'user_id'=>Auth::user()->id
            ]);
            Session::flash('success','Registo foi criado com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();
    }

    public function edit($id){
        return view('forms.judicial.edit')
            ->with('registo',Judicial::findOrFail($id))
            ->with('tribunal',Tribunal::orderBy('nome')->get())
            ->with('juizo',VaraJuizo::orderBy('nome')->get())
            ->with('classificacao',Classificacao::orderBy('nome')->get())
            ->with('oficio',OficioSessao::orderBy('nome')->get())
            ->with('tipologia',TipologiaJudicial::orderBy('nome')->get())
            ->with('freguesia',Freguesia::orderBy('nome')->get());
    }

    public function update(JudicialFormValidation $request , $id){
        $url = $request->input('url');
        try {
            $registo = Judicial::findOrFail($id);
            $registo->dataInicial = $request->dataInicial;
            $registo->dataFinal = $request->dataFinal;
            $registo->autor = $request->autor;
            $registo->reu = $request->reu;
            $registo->caixa = $request->caixa;
            $registo->numero = $request->numero;
            $registo->numeroProcesso = $request->numeroProcesso;
            $registo->assuntos = $request->assuntos;
            $registo->anexo = $request->apensos;
            $registo->freguesia_id = $request->freguesia;
            $registo->tribunal_id = $request->tribunal;
            $registo->varaJuizo_id = $request->juizo;
            $registo->classificacao_id = $request->classificacao;
            $registo->oficio_seccao_id = $request->oficio;
            $registo->tipologiaJudicial_id = $request->tipologia;
            $registo->observacao = $request->observacao;
            $registo->updated_user_id = Auth::user()->id;
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect($url);
    }

    public function basicSearchForm(){

        return view('forms.judicial.basic-search');
    }


    public function basicSearch(Request $request){

        if (empty($request->reu) && empty($request->autor) && empty($request->processo) && empty($request->data)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        $query = Judicial::BasicSearchQuery($request->reu,$request->autor,$request->data,$request->processo)->limit(300)->get();

        if ($query->count() >0)
            return view('forms.judicial.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }
    public function advancedSearchForm(){

        return view('forms.judicial.advanced-search')
            ->with('freguesia',Freguesia::orderBy('nome')->get())
            ->with('tribunal',Tribunal::orderBy('nome')->get())
            ->with('tipologia',TipologiaJudicial::orderBy('nome')->get())
            ->with('oficio',OficioSessao::orderBy('nome')->get())
            ->with('classificacao',Classificacao::orderBy('nome')->get())
            ->with('juizo',VaraJuizo::orderBy('nome')->get());
    }
    public function advancedSearch(Request $request){

        if (empty($request->numeroProcesso) && empty($request->caixa)&& empty($request->data) && empty($request->autor) &&
            empty($request->reu) && empty($request->freguesia) &&empty($request->tribunal) && empty($request->tipologia)
            && empty($request->observacao) && empty($request->apensos) && empty($request->oficio) && empty($request->classificacao) && empty($request->juizo)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        $query = Judicial::AdvancedSearchQuery($request->numeroProcesso,$request->caixa,$request->data,
            $request->autor,$request->reu,$request->freguesia,$request->tribunal,$request->tipologia,$request->observacao,
            $request->classificacao,$request->oficio,$request->apensos,$request->juizo)->limit(300)->get();
        if ($query->count() >0)
            return view('forms.judicial.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $registo = Judicial::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
