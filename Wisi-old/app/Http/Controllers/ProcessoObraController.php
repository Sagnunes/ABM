<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\Entidade;
use App\Freguesia;
use App\Http\Requests\ProjetoObrasFormValidation;
use App\ProcessoObra;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class ProcessoObraController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:6');
        $this->middleware('createPermission:6', ['only' => ['create','store']]);
        $this->middleware('editPermission:6', ['only' => ['edit','update']]);
        $this->middleware('readPermission:6', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:6', ['only' => ['destroy']]);

    }
    public function create(){
        return view('forms.processoObra.create')
            ->with('freguesia',Freguesia::orderBy('nome')->get())
            ->with('entidade',Entidade::orderBy('nome')->get());
    }

    public function store(ProjetoObrasFormValidation $request){
        $random = new randomID();

        try{
            $registo = ProcessoObra::create([
                'id'=>$random->generateID(),
                'entidade_id'=>$request->entidade,
                'objeto'=>$request->objeto,
                'concelho'=>$request->concelho,
                'freguesia_id'=>$request->freguesia,
                'sitio'=>$request->sitio,
                'localizacao'=>$request->localizacao,
                'tipo_obra'=>$request->tipo_obra,
                'data'=>$request->data,
                'volume'=>$request->volume,
                'cota'=>$request->cota,
                'numero_documento'=>$request->documento,
                'numero_projeto'=>$request->projeto,
                'observacao'=>$request->observacao,
                'user_id'=>Auth::user()->id,
            ]);
            Session::flash('success','Registo foi criado com sucesso.');;
        }
        catch(\Exception $exception)
        {
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();
    }

    public function edit($id){
        return view('forms.processoObra.edit')
            ->with('freguesia',Freguesia::orderBy('nome')->get())
            ->with('entidade',Entidade::orderBy('nome')->get())
            ->with('registo',ProcessoObra::findOrFail($id));
    }

    public function update(ProjetoObrasFormValidation $request, $id){
        try {
            $registo = ProcessoObra::findOrFail($id);
            $registo->entidade_id = $request->entidade;
            $registo->objeto = $request->objeto;
            $registo->concelho = $request->concelho;
            $registo->freguesia_id = $request->freguesia;
            $registo->sitio = $request->sitio;
            $registo->localizacao = $request->localizacao;
            $registo->tipo_obra = $request->tipo_obra;
            $registo->data = $request->data;
            $registo->volume = $request->volume;
            $registo->cota = $request->cota;
            $registo->numero_documento = $request->documento;
            $registo->numero_projeto = $request->projeto;
            $registo->observacao = $request->observacao;
            $registo->updated_user_id = Auth::user()->id;
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('processoObra.basicSearchForm');
    }

    public function advancedSearchForm(){

        return view('forms.processoObra.advanced-search')
            ->with('freguesia',Freguesia::orderBy('nome')->get())
            ->with('entidade',Entidade::orderBy('nome')->get());
    }

    public function advancedSearch(Request $request){

        if ($this->isRequestEmpty($request)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        $data = $request->processoObra;
        $query = ProcessoObra::AdvancedSearchQuery($data)->limit(300)->get();

        if ($query->count() >0)
            return view('forms.processoObra.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $registo = ProcessoObra::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isRequestEmpty(Request $request): bool
    {
        return empty($request->processoObra['cota']) && empty($request->processoObra['documento']) && empty($request->processoObra['projeto'])
            && empty($request->processoObra['entidade']) && empty($request->processoObra['data']) &&
            empty($request->processoObra['tipo_obra']) && empty($request->processoObra['objeto'])
            && empty($request->processoObra['freguesia']) && empty($request->processoObra['sitio']) &&
            empty($request->processoObra['observacao']);
    }


}
