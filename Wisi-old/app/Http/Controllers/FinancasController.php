<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\EntidadeFinanca;
use App\Financa;
use App\Freguesia;
use App\Http\Requests\FinancasFormValidation;
use Illuminate\Http\Request;
use Auth;



class FinancasController extends Controller
{

    public function __construct()
    {
        $this->middleware('permission:7');
        $this->middleware('createPermission:7', ['only' => ['create','store']]);
        $this->middleware('editPermission:7', ['only' => ['edit','update']]);
        $this->middleware('readPermission:7', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:7', ['only' => ['destroy']]);

    }
    public function create()
    {
       return view('forms.financas.create')
           ->with('freguesia',Freguesia::orderBy('nome')->get());
    }
    public function store(FinancasFormValidation $request){

        try{
            $random = new randomID();
            Financa::create($this->assignDataFromRequestAndCreateNewRecord($request, $random));
            $this->flashSessionInformation("success","Registo foi criado!");
        }catch (\Exception $exception){
            $this->flashSessionInformation('error','Registo não foi criado');
        }
        return redirect()->back();
    }
    public function edit($id){
        return view('forms.financas.edit')
            ->with('registo',Financa::find($id))
            ->with('freguesia',Freguesia::orderBy('nome')->get())
            ->with('entidade',EntidadeFinanca::orderBy('nome')->get());
    }

    public function update(FinancasFormValidation $request , $id){
        $url = $request->input('url');
        try {
            $this->findRecordAssignNewDataAndUpdate($request, $id);
            $this->flashSessionInformation('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            $this->flashSessionInformation('error','Registo não foi alterado.');
        }
        return redirect($url);
    }

    public function advancedSearchForm(){

        return view('forms.financas.advanced-search')
            ->with('freguesia',Freguesia::orderBy('nome')->get())
            ->with('entidade',EntidadeFinanca::orderBy('nome')->get());
    }

    public function advancedSearch(Request $request){
       if ($this->isRequestFromSearchEmpty($request)){
           $this->flashSessionInformation('error','Necessário introduzir dados no formulário');
           return redirect()->back();
       }
        $data = $request->financas;

        $query = Financa::SearchIntoDatabaseWithParameters($data)->limit(400)->get();
        if ($query->count() >0)
            return view('forms.financas.index')->with('results',$query);
        else{
            $this->flashSessionInformation('error','Pesquisa efetuada não devolveu nenhum resultado');
            return redirect()->back();
        }
    }

    public function destroy($id)
    {
        $registo = Financa::find($id);
        $registo->delete();
        $this->flashSessionInformation('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

    /**
     * @param FinancasFormValidation $request
     * @param $random
     * @return array
     */
    public function assignDataFromRequestAndCreateNewRecord(FinancasFormValidation $request, $random): array
    {
        return [
            'id' => $random->generateID(),
            'numeroCaixa' => $request->caixa,
            'numeroCapilha' => $request->capilha,
            'numeroProcesso' => $request->processo,
            'entidade_id' => $request->entidade,
            'tipoProcesso' => $request->tipo,
            'nome' => $request->nome,
            'estadoCivil' => $request->estadoCivil,
            'morada' => $request->morada,
            'freguesia_id' => $request->freguesia,
            'dataObito' => $request->obito,
            'dataInicial' => $request->inicial,
            'dataFinal' => $request->final,
            'observacoes' => $request->observacao,
            'user_id' => Auth::user()->id,
        ];
    }

    /**
     * @param FinancasFormValidation $request
     * @param $id
     */
    public function findRecordAssignNewDataAndUpdate($request, $id): void
    {
        $registo = Financa::findOrFail($id);
        $registo->numeroCaixa = $request->caixa;
        $registo->numeroCapilha = $request->capilha;
        $registo->numeroProcesso = $request->processo;
        $registo->entidade_id = $request->entidade;
        $registo->tipoProcesso = $request->tipo;
        $registo->nome = $request->nome;
        $registo->estadoCivil = $request->estadoCivil;
        $registo->morada = $request->morada;
        $registo->freguesia_id = $request->freguesia;
        $registo->dataObito = $request->obito;
        $registo->dataInicial = $request->inicial;
        $registo->dataFinal = $request->final;
        $registo->observacoes = $request->observacao;
        $registo->updated_user_id = Auth::user()->id;
        $registo->save();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isRequestFromSearchEmpty(Request $request): bool
    {
        return empty($request->financas['caixa']) && empty($request->financas['capilha']) && empty($request->financas['processo']) && empty($request->financas['entidade'])
            && empty($request->financas['nome']) && empty($request->financas['freguesia']) && empty($request->financas['obito']) && empty($request->financas['inicial']);
    }
}
