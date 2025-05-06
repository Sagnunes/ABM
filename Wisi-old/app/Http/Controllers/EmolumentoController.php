<?php

namespace App\Http\Controllers;

use App\Emolumento;
use App\Http\Requests\EmolumentoFormValidation;
use Illuminate\Http\Request;
use Auth;
use Session;
use PDF;
class EmolumentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:15');
        $this->middleware('createPermission:15', ['only' => ['create','store']]);
        $this->middleware('editPermission:15', ['only' => ['edit','update']]);
        $this->middleware('readPermission:15', ['only' => ['basicSearchForm','basicSearch']]);
        $this->middleware('deletePermission:15', ['only' => ['destroy']]);

    }

    public function create(){
        return view('forms.emolumento.create');
    }

    public function store(EmolumentoFormValidation $request){
        try {
            $registo = Emolumento::create([
                'data' => $request->data,
                'requerente' => $request->requerente,
                'teorDocumento' => $request->teorDoc,
                'nProcesso' => $request->processo,
                'livro' => $request->livro,
                'cota' => $request->cota,
                'registo' => $request->registo,
                'folha' => $request->folha,
                'ano' => $request->ano,
                'pagamento' => $request->pagamento,
                'valor' => $request->valor,
                'user_id' => Auth::user()->id
            ]);
            Session::flash('success', 'Registo foi criado com sucesso.');
        } catch (\Exception $e) {
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();
    }

    public function basicSearchForm(){

        return view('forms.emolumento.basic-search');
    }


    public function basicSearch(Request $request){

        if (empty($request->dataInicial) && empty($request->dataFinal)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        $inicial = $request->dataInicial;
        $final = $request->dataFinal;
        $query = Emolumento::BasicSearchQuery($request->dataInicial,$request->dataFinal)->get();

        if ($query->count() >0)
            return view('forms.emolumento.index')->with('results',$query)->with('inicial',$inicial)->with('final',$final);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }
    public function pdf($inicial,$final){
        $query = Emolumento::BasicSearchQuery($inicial,$final)->get();
        return view('forms.emolumento.pdf')->with('dados',$query);

    }
}
