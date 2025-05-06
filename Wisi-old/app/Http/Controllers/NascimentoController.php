<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\Http\Requests\BatismoFormValidation;
use App\LocalParoquial;
use App\Nascimento;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Session;

class NascimentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:1');
        $this->middleware('createPermission:1', ['only' => ['create','store']]);
        $this->middleware('editPermission:1', ['only' => ['edit','update']]);
        $this->middleware('readPermission:1', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:1', ['only' => ['destroy']]);
    }
    public function index(){
        return view('forms.nascimento.index')
            ->with('registo',Nascimento::Search())
            ->with('filtro',LocalParoquial::all());
    }
    public function create(){
        return view('forms.nascimento.create')->with('registos',LocalParoquial::orderBy('nome','asc')->get());
    }

    public function store(BatismoFormValidation $request){

        try{
            $randomID = new randomID();
            Nascimento::create($this->assignDataFromRequestAndCreateNewRecord($request, $randomID));
            $this->flashSessionInformation('success','Registo foi criado com sucess');

        }catch (\Exception $e){
            $this->flashSessionInformation('error','Registo não foi criado.');
        }

        return redirect()->route('nascimento.create');
    }

    public function edit($id){
        return view('forms.nascimento.edit')
            ->with('registo',Nascimento::findOrFail($id))
            ->with('local',LocalParoquial::orderBy('nome','asc')->get());
    }
    public function update(BatismoFormValidation $request,$id){

        $url = $request->input('url');
        try {
            $this->findRecordAssignNewDataAndUpdate($request, $id);
            $this->flashSessionInformation('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            $this->flashSessionInformation('error','Registo não foi alterado.');
        }
        return redirect($url);
    }

    public function searchForm(){

        return view('forms.nascimento.advanced-search')->with('registos',LocalParoquial::orderBy('nome','asc')->get());
    }
    public function searchQuery(Request $request){
        if ($this->isRequestEmpty($request)){
            $this->flashSessionInformation('error','Tem de introduzir dados no formulario de pesquisa.');
            return redirect()->route('nascimento.searchForm');
        }

        $data_from_view = $request->nascimento;
        $query = Nascimento::searchIntoDatabaseWithParameters($data_from_view)->limit(500)->get();
        if ($query->count() >0)
            return view('forms.nascimento.index')->with('results',$query);
        else{
            $this->flashSessionInformation('error','Nenhum dado encontrado');

            return redirect()->route('nascimento.searchForm');
        }
    }
    public function destroy($id)
    {
        $registo = Nascimento::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

    /**
     * @param BatismoFormValidation $request
     * @param $id
     */
    public function findRecordAssignNewDataAndUpdate(BatismoFormValidation $request, $id): void
    {
        $registo = Nascimento::findOrFail($id);
        $registo->data = $request->data;
        $registo->nRegisto = $request->nRegisto;
        $registo->livro = $request->livro;
        $registo->folha = $request->folha;
        $registo->filho = $request->filho;
        $registo->pai = $request->pai;
        $registo->folha = $request->folha;
        $registo->mae = $request->mae;
        $registo->observacao = $request->observacao;
        $registo->updated_user_id = Auth::user()->id;
        $registo->localParoquial_id = $request->local;
        $registo->save();
    }

    /**
     * @param BatismoFormValidation $request
     * @param $randomID
     * @return array
     */
    public function assignDataFromRequestAndCreateNewRecord(BatismoFormValidation $request, $randomID): array
    {
        return [
            'id' => $randomID->generateID(),
            'localParoquial_id' => $request->local,
            'data' => $request->data,
            'nRegisto' => $request->nRegisto,
            'livro' => $request->livro,
            'folha' => $request->folha,
            'filho' => $request->filho,
            'mae' => $request->mae,
            'pai' => $request->pai,
            'observacao' => $request->observacao,
            'user_id' => Auth::user()->id
        ];
    }

    /**
     * @param Request $request
     * @return bool
     */
    public function isRequestEmpty(Request $request): bool
    {
        return empty($request->nascimento['data']) && empty($request->nascimento['folha'])&& empty($request->nascimento['local']) && empty($request->nascimento['livro']) &&
            empty($request->nascimento['filho']) && empty($request->nascimento['pai']) && empty($request->mae) && empty($request->nRegisto)
            && empty($request->obs);
    }
}
