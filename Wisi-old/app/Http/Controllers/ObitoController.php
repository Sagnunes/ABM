<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\Http\Requests\ObitoFormValidation;
use App\LocalParoquial;
use App\Obito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class ObitoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:9');
        $this->middleware('createPermission:9', ['only' => ['create','store']]);
        $this->middleware('editPermission:9', ['only' => ['edit','update']]);
        $this->middleware('readPermission:9', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:9', ['only' => ['destroy']]);

    }
    public function create(){
        return view('forms.obito.create')
            ->with('registos',LocalParoquial::all());
    }

    public function store(ObitoFormValidation $request){
        try {
            $random = new randomID();
            $dados = Obito::create([
                'id' => $random->generateID(),
                'localParoquial_id' => $request->local,
                'nome' => $request->nome,
                'data' => $request->data,
                'pai' => $request->paiFalecido,
                'mae' => $request->maeFalecido,
                'conjuge' => $request->conjuge,
                'nRegisto' => $request->nRegisto,
                'estadoCivil' => $request->estadocivil,
                'livro' => $request->livro,
                'folha' => $request->folha,
                'numero' => $request->numero,
                'observacao' => $request->observacao,
                'user_id' => Auth::user()->id
            ]);
            Session::flash('success','Registo foi criado com sucesso.');

        }catch (\Exception $e){
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->route('obito.create');
    }
    public function edit($id){
        return view('forms.obito.edit')
            ->with('registo',Obito::findOrFail($id))
            ->with('local',LocalParoquial::all());
    }
    public function update(ObitoFormValidation $request , $id){
        $url = $request->input('url');
        try {
            $registo = Obito::findOrFail($id);
            $registo->data = $request->data;
            $registo->localParoquial_id = $request->local;
            $registo->nome = $request->nome;
            $registo->numero = $request->numero;
            $registo->nRegisto = $request->nRegisto;
            $registo->livro = $request->livro;
            $registo->folha = $request->folha;
            $registo->conjuge = $request->conjuge;
            $registo->mae = $request->maeFalecido;
            $registo->pai = $request->paiFalecido;
            $registo->observacao = $request->observacao;
            $registo->updated_user_id = Auth::user()->id;
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect($url);
    }

    public function advancedSearchForm(){

        return view('forms.obito.advanced-search')->with('registos',LocalParoquial::all());
    }
    public function advancedSearch(Request $request){

        if (empty($request->obito['local']) && empty($request->obito['folha']) && empty($request->obito['livro']) && empty($request->obito['data']) && empty($request->obito['falecido'])
        && empty($request->obito['pai']) && empty($request->obito['mae']) && empty($request->obs)){
            $this->flashSessionInformation('error','Necessário preencher um dos campos.');
            return redirect()->route('obito.advancedSearchForm');
        }
        $data = $request->obito;
        $query = Obito::AdvancedSearchQuery($data)->limit(400)->orderBy('folha')->get();
        if ($query->count() >0)
            return view('forms.obito.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->route('obito.advancedSearchForm');
        }
    }
    public function destroy($id)
    {
        $registo = Obito::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
