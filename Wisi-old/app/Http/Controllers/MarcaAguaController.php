<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\Fundo;
use App\Http\Requests\MarcaAguaFormValidation;
use App\Http\Requests\MarcaAguaUpdatedFormValidation;
use App\MarcaAgua;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class MarcaAguaController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:12');
        $this->middleware('createPermission:12', ['only' => ['create','store']]);
        $this->middleware('editPermission:12', ['only' => ['edit','update']]);
        $this->middleware('readPermission:12', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:12', ['only' => ['destroy']]);

    }
    public function index(){
       return view('forms.marcas-agua.index')->with('results',MarcaAgua::RetrieveAllData()->get()->sortBy('tema'));
    }
    public function create(){
        return view('forms.marcas-agua.create')
            ->with('fundo',Fundo::all());
    }

    public function store(MarcaAguaFormValidation $request){

        try {
            $randomID = new randomID();

            $featured = $request->file;
            $featured_new_name = time() . $featured->getClientOriginalName();
            $featured->move('storage/uploads/marca_agua', $featured_new_name);
            $Ficheiro = MarcaAgua::create([
                'id' => $randomID->generateID(),
                'tema' => $request->tema,
                'subTema' => $request->subTema,
                'cota' => $request->cota,
                'resumo' => $request->resumo,
                'fundo_id' => $request->fundo,
                'data' => $request->data,
                'folio' => $request->folio,
                'descricao' => $request->descricao,
                'user_id' => Auth::user()->id,
                'imagem' => 'storage/uploads/marca_agua/' . $featured_new_name
            ]);
            Session::flash('success', 'Registo foi criado com sucesso.');
        } catch (\Exception $e) {
            Session::flash('error','Registo não foi devidamente criado.');
        }


        return redirect()->back();
    }
    public function edit($id){
        return view('forms.marcas-agua.edit')
            ->with('registo',MarcaAgua::findOrFail($id))
            ->with('fundo',Fundo::all());
    }
    public function update(MarcaAguaUpdatedFormValidation $request , $id){
        try {
            $registo = MarcaAgua::findOrFail($id);
            $registo->data = $request->data;
            $registo->tema = $request->tema;
            $registo->subTema = $request->subTema;
            $registo->cota = $request->cota;
            $registo->fundo_id = $request->fundo;
            $registo->resumo = $request->resumo;
            $registo->folio = $request->folio;
            $registo->descricao = $request->descricao;
            $registo->updated_user_id = Auth::user()->id;
            if ($request->hasFile('file'))
            {
                $featured = $request ->file;
                $featured_new_name = time().$featured->getClientOriginalName();
                $featured->move('storage/uploads/marca_agua',$featured->getClientOriginalName());
                $registo->imagem = 'storage/uploads/marca_agua/'.$featured->getClientOriginalName();
            }
            $registo->save();
            Session::flash('success','Registo alterado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi alterado!');
        }
        return redirect()->route('marcaagua.index');
    }
    public function basicSearchForm(){

        return view('forms.marcas-agua.basic-search')->with('fundo',Fundo::all());
    }

    public function basicSearch(Request $request){

        if (empty($request->tema) && empty($request->cota) && empty($request->fundo) && empty($request->data) ){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        $query = MarcaAgua::BasicSearchQuery($request->tema,$request->cota,$request->fundo,$request->data)->limit(300)->get();

        if ($query->count() >0)
            return view('forms.marcas-agua.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }
    public function destroy($id)
    {
        $registo = MarcaAgua::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

}
