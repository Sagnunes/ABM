<?php

namespace App\Http\Controllers;

use App\AreaOrg;
use App\Classes\randomID;
use App\cmfunchal;
use App\Fundo;
use App\Http\Requests\CMFUNFormValidation;
use Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CMFUNController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:5');
        $this->middleware('createPermission:5', ['only' => ['create','store']]);
        $this->middleware('editPermission:5', ['only' => ['edit','update']]);
        $this->middleware('readPermission:5', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:5', ['only' => ['destroy']]);

    }

    public function create(){
        return view('forms.cmfun.create')
            ->with('fundo',Fundo::all())
            ->with('area',AreaOrg::all());
    }

    public function store(CMFUNFormValidation $request){

        $random = new randomID();
//        dd('fundo',$request->fundo);
        try{


            $registo = cmfunchal::create([
                'id'=>$random->generateID(),
                'fundo_id'=>$request->fundo,
                'cota'=>$request->cota,
                'codRef'=>$request->codRef,
                'estadoConservacao'=>$request->estado,
                'dimSuporte'=>$request->dimSuporte,
                'areaOrgFunc_id'=>$request->areaOrg,
                'nivelDescricao'=>$request->nivelDescricao,
                'serieSubserie'=>$request->serie,
                'tituloOriginal'=>$request->tituloOriginal,
                'titulo'=>$request->titulo,
                'dataInicial'=>$request->dataInicial,
                'dataFinal'=>$request->dataFinal,
                'ambitoConteudo'=>$request->ambito,
                'observacao'=>$request->observacao,
                'user_id'=>Auth::user()->id

            ]);
            Session::flash('success','Registo adicionado com sucesso.');
        }catch (\Exception $exception){
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();

    }

    public function edit($id){
        return view('forms.cmfun.edit')
            ->with('registo',cmfunchal::findOrFail($id))
            ->with('fundo',Fundo::all())
            ->with('area',AreaOrg::all());
    }

    public function update(CMFUNFormValidation $request, $id){
        $url = $request->input('url');
        try {

            $dataInicial = date('Y-m-d',strtotime($request->dataInicial));
            $dataFinal = date('Y-m-d',strtotime($request->dataFinal));
            $registo = cmfunchal::findOrFail($id);
            $registo->dataInicial = $dataInicial;
            $registo->dataFinal =$dataFinal;
            $registo->cota = $request->cota;
            $registo->codRef = $request->codRef;
            $registo->dimSuporte = $request->dimSuporte;
            $registo->nivelDescricao = $request->nivelDescricao;
            $registo->areaOrgFunc_id = $request->areaOrg;
            $registo->serieSubserie = $request->serie;
            $registo->tituloOriginal = $request->tituloOriginal;
            $registo->titulo = $request->titulo;
            $registo->estadoConservacao = $request->estado;
            $registo->ambitoConteudo = $request->ambito;
            $registo->fundo_id = $request->fundo;
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
        return view('forms.cmfun.basic-search')->with('area',AreaOrg::all());
    }

    public function basicSearch(Request $request){

        if (empty($request->areaOrg) && empty($request->titulo) && empty($request->data)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        $query = cmfunchal::BasicSearchQuery($request->areaOrg,$request->titulo,$request->data)->limit(300)->get();
        if ($query->count() >0)
            return view('forms.cmfun.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }

    public function advancedSearchForm(){

        return view('forms.cmfun.advanced-search')->with('area',AreaOrg::all());
    }

    public function advancedSearch(Request $request){

        if (empty($request->areaOrg) && empty($request->titulo) && empty($request->serie) && empty($request->data) && empty($request->cota) && empty($request->codRef)&& empty($request->ambito) && empty($request->estado)  && empty($request->obs)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        $query = cmfunchal::AdvancedSearchQuery($request->areaOrg,$request->serie,$request->cota,$request->codRef,$request->data,$request->titulo,$request->ambito,$request->estado,$request->obs)->limit(300)->get();
        if ($query->count() >0)
            return view('forms.cmfun.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $registo = cmfunchal::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

}
