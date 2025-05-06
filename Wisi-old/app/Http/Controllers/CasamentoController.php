<?php

namespace App\Http\Controllers;

use App\Acessos;
use App\Casamento;
use App\Classes\randomID;
use App\Http\Requests\CasamentoFormValidation;
use App\LocalParoquial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;


class CasamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:2');
        $this->middleware('createPermission:2', ['only' => ['create','store']]);
        $this->middleware('editPermission:2', ['only' => ['edit','update']]);
        $this->middleware('readPermission:2', ['only' => ['advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:2', ['only' => ['destroy']]);
    }

    public function create(){
        return view('forms.casamento.create')->with('registos',LocalParoquial::all());
    }

    public function store(CasamentoFormValidation $request){
        $random = new randomID();
        try{
            Casamento::create($this->assignDataFromRequestAndCreateNewRecord($request, $random));
            $this->flashSessionInformation('success','Registo adicionado com sucesso.');
        }catch (\Exception $exception){
            $this->flashSessionInformation('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();
    }
    public function edit($id){
        return view('forms.casamento.edit')
            ->with('registo',Casamento::find($id))
            ->with('local',LocalParoquial::all());
    }

    public function update(CasamentoFormValidation $request, $id){
        $url = $request->input('url');
        try {
            $this->findRecordAssignNewDataAndUpdate($request, $id);
            $this->flashSessionInformation('success','Registo alterado com sucesso');
        }catch (\Exception $e){
            $this->flashSessionInformation('error','Registo não foi alterado!');
        }
        return redirect($url);
    }

    public function searchForm(){

        return view('forms.casamento.advanced-search')->with('registos',LocalParoquial::orderBy('nome','ASC')->get());
    }

    public function searchQuery(Request $request){

        if ($this->isRequestEmpty($request)){
            $this->flashSessionInformation('error','Tem de introduzir dados no formulário de pesquisa');
            return redirect()->back();
        }

        $data_from_view = $request->casamento;

        $query = Casamento::searchIntoDatabaseWithParameters($data_from_view)
            ->limit(300)->get();

        if ($query->count() >0)
            return view('forms.casamento.index')->with('results',$query);
        else{
            $this->flashSessionInformation('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }

    public function pdf($id){
        $registo = Casamento::findOrFail($id);
        return view('forms.casamento.pdf')->with('registo',$registo);
    }

    public function destroy($id)
    {
        $registo = Casamento::find($id);
        $registo->delete();
        $this->flashSessionInformation('success','Registo foi apagado');
        return redirect(url()->previous());
    }

    /**
     * @param CasamentoFormValidation $request
     * @param $random
     * @return array
     */
    public function assignDataFromRequestAndCreateNewRecord(CasamentoFormValidation $request, $random): array
    {
        return [
            'id' => $random->generateID(),
            'data' => $request->data,
            'nRegisto' => $request->nRegisto,
            'livro' => $request->livro,
            'folha' => $request->folha,
            'numero' => $request->numero,
            'marido' => $request->marido,
            'mulher' => $request->mulher,
            'maeMarido' => $request->maeMarido,
            'paiMarido' => $request->paiMarido,
            'maeMulher' => $request->maeMulher,
            'paiMulher' => $request->paiMulher,
            'observacao' => $request->observacao,
            'user_id' => Auth::user()->id,
            'localParoquial_id' => $request->local,

        ];
    }

    /**
     * @param CasamentoFormValidation $request
     * @param $id
     */
    public function findRecordAssignNewDataAndUpdate(CasamentoFormValidation $request, $id): void
    {
        $registo = Casamento::findOrFail($id);
        $registo->data = $request->data;
        $registo->nRegisto = $request->nRegisto;
        $registo->livro = $request->livro;
        $registo->folha = $request->folha;
        $registo->numero = $request->numero;
        $registo->marido = $request->marido;
        $registo->mulher = $request->mulher;
        $registo->maeMarido = $request->maeMarido;
        $registo->paiMarido = $request->paiMarido;
        $registo->maeMulher = $request->maeMulher;
        $registo->paiMulher = $request->paiMulher;
        $registo->updated_user_id = Auth::user()->id;
        $registo->observacao = $request->observacao;
        $registo->localParoquial_id = $request->local;
        $registo->save();
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isRequestEmpty(Request $request): bool
    {
        return empty($request->casamento['data']) && empty($request->casamento['folha']) && empty($request->casamento['local']) && empty($request->casamento['nRegisto']) && empty($request->casamento['marido']) &&
            empty($request->casamento['mulher'])
            && empty($request->casamento['paiMarido']) && empty($request->casamento['maeMarido']) && empty($request->casamento['paiMulher']) && empty($request->casamento['maeMulher']) &&
            empty($request->casamento['observacao']) && empty($request->casamento['livro']);
    }
}
