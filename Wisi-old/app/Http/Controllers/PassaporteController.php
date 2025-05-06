<?php

namespace App\Http\Controllers;

use App\Acompanhante;
use App\CategoriaAcompanhante;
use App\Classes\randomID;
use App\Destino;
use App\Http\Requests\PassaporteFormValidation;
use App\Meses;
use App\Naturalidade;
use App\Passaporte;
use FontLib\TrueType\Collection;
use function foo\func;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Auth;

class PassaporteController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:4');
        $this->middleware('createPermission:4', ['only' => ['create','store']]);
        $this->middleware('editPermission:4', ['only' => ['edit','update']]);
        $this->middleware('readPermission:4', ['only' => ['basicSearchForm','basicSearch','advancedSearchForm','advancedSearch']]);
        $this->middleware('deletePermission:4', ['only' => ['destroy']]);

    }
    public function create(){
        return view('forms.passaporte.create')
            ->with('naturalidade',Naturalidade::orderBy("nome")->get())
            ->with('destino',Destino::orderBy("nome")->get())
            ->with('categoria',CategoriaAcompanhante::orderBy("nome")->get())
            ->with('meses',Meses::all());
    }

    public function store(PassaporteFormValidation $request){


        $random = new randomID();
        $registo = Passaporte::create($this->assignDataFromRequestAndCreateNewRecord($request, $random));

        if (!empty($request->acompanhante[0]['categoria'])){
            for ($i = 0, $iMax = \count($request->acompanhante); $i < $iMax; $i++) {
                $add = new Acompanhante();
                $add->id = $random->generateID();
                $add->categoria_id = $request->acompanhante[$i]['categoria'];
                $add->nome = $request->acompanhante[$i]['nomeAcompanhante'];
                $add->passaporte_id = $registo->id;
                $add->save();

            }
        }
        Session::flash('success','Registo foi criado com sucesso.');


        return redirect()->back();
    }

    public function edit($id){
        $passaporte = Passaporte::findOrFail($id);
        $acompanhantes = Acompanhante::where('passaporte_id',$passaporte->id)->get();

        return view('forms.passaporte.edit')
            ->with('registo',Passaporte::findOrFail($id))
            ->with('acompanhantes',$acompanhantes)
            ->with('naturalidade',Naturalidade::orderBy('nome')->get())
            ->with('destino',Destino::orderBy('nome')->get())
            ->with('categoria',CategoriaAcompanhante::orderBy('nome')->get())
            ->with('meses',Meses::all());
    }

    public function update(Request $request, $id){
        $url = $request->input('url');

        $this->findRecordAssignNewDataAndUpdate($request, $id);
        $this->flashSessionInformation('success','Registo alterado com sucesso.');
        return redirect($url);
    }

    public function advancedSearchForm(){

        return view('forms.passaporte.advanced-search')
            ->with('destino',Destino::all()->sortBy('nome'))
            ->with('naturalidade',Naturalidade::all()->sortBy('nome'));
    }
    public function advancedSearch(Request $request){

        if (empty($request->caixa) && empty($request->processo) && empty($request->passaporte) && empty($request->ano) && empty($request->mes) && empty($request->destino)
            && empty($request->requerente) && empty($request->pai) && empty($request->mae) && empty($request->naturalidade) && empty($request->conjuge) && empty($request->observacao)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        $query = Passaporte::AdvancedSearchQuery($request->caixa,$request->processo,$request->passaporte,$request->ano,$request->mes,$request->destino,$request->requerente,$request->pai,
            $request->mae,$request->naturalidade,$request->conjuge,$request->observacao)->limit(400)->get();
        if ($query->count() >0)
            return view('forms.passaporte.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $registo = Passaporte::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

    public function consulta($id)
    {
        $passaporte = Passaporte::findOrFail($id);
        $acompanhantes = Acompanhante::where('passaporte_id',$passaporte->id)->get();
        return view('forms.passaporte.consulta')->with('registo',$passaporte)->with('acompanhantes',$acompanhantes);
    }

    public function consultaAcompanhantes($id){
        $acompanhantes = Acompanhante::where('passaporte_id',$id)->get();
        return view('forms.passaporte.consultaAcompanhantes')->with('results',$acompanhantes);
    }
    public function apagarAcompanhante($id)
    {
        $registo = Acompanhante::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

    /**
     * @param PassaporteFormValidation $request
     * @param $random
     * @return array
     */
    public function assignDataFromRequestAndCreateNewRecord(PassaporteFormValidation $request, $random): array
    {
        return [
            'id' => $random->generateID(),
            'numeroCaixa' => $request->caixa,
            'folha' => $request->folha,
            'estadoCivil' => $request->estadoCivil,
            'numeroSaida' => $request->numeroSaida,
            'cartaPessoal' => $request->cartaPessoal,
            'cartaPessoalQuantidade' => $request->cartaPessoalQuantidade,
            'numeroProcesso' => $request->processo,
            'numeroPassaporte' => $request->passaporte,
            'requerente' => $request->requerente,
            'requerentePai' => $request->requerentePai,
            'requerenteMae' => $request->requerenteMae,
            'bi' => $request->bi,
            'idade' => $request->idade,
            'dataBatismoNascimento' => $request->data,
            'conjuge' => $request->conjuge,
            'conjugePai' => $request->conjugePai,
            'conjugeMae' => $request->conjugeMae,
            'mes' => $request->mes,
            'ano' => $request->ano,
            'user_id' => Auth::user()->id,
            'destino_id' => $request->destino,
            'naturalidade_id' => $request->naturalidade,
            'observacao' => $request->observacao
        ];
    }

    /**
     * @param Request $request
     * @param $id
     */
    public function findRecordAssignNewDataAndUpdate(Request $request, $id): void
    {
        $random = new randomID();
        $registo = Passaporte::findOrFail($id);
        $registo->mes = $request->mes;
        $registo->ano = $request->ano;
        $registo->numeroCaixa = $request->caixa;
        $registo->estadoCivil = $request->estadoCivil;
        $registo->numeroSaida = $request->numeroSaida;
        $registo->cartaPessoal = $request->cartaPessoal;
        $registo->cartaPessoalQuantidade = $request->cartaPessoalQuantidade;
        $registo->numeroPassaporte = $request->passaporte;
        $registo->folha = $request->folha;
        $registo->numeroProcesso = $request->processo;
        $registo->requerente = $request->requerente;
        $registo->requerentePai = $request->requerentePai;
        $registo->requerenteMae = $request->requerenteMae;
        $registo->bi = $request->bi;
        $registo->idade = $request->idade;
        $registo->dataBatismoNascimento = $request->data;
        $registo->conjuge = $request->conjuge;
        $registo->conjugeMae = $request->conjugeMae;
        $registo->conjugePai = $request->conjugePai;
        $registo->observacao = $request->observacao;
        $registo->destino_id = $request->destino;
        $registo->naturalidade_id = $request->naturalidade;
        $registo->updated_user_id = Auth::user()->id;

        if (!empty($request->id)) {
            for ($i = 0, $iMax = \count($request->id); $i < $iMax; $i++) {
                $registo_acompanhante = Acompanhante::findOrFail($request->id[$i]);
                $registo_acompanhante->categoria_id = $request->categoriaAcompanhante[$i];
                $registo_acompanhante->nome = $request->nomeAcompanhante[$i];
                $registo_acompanhante->passaporte_id = $registo->id;
                $registo_acompanhante->save();
            }
        }
        if (!empty($request->acompanhante[0]['categoria'])) {
            for ($i = 0, $iMax = \count($request->acompanhante); $i < $iMax; $i++) {
                $add = new Acompanhante();
                $add->id = $random->generateID();
                $add->categoria_id = $request->acompanhante[$i]['categoria'];
                $add->nome = $request->acompanhante[$i]['nomeAcompanhante'];
                $add->passaporte_id = $registo->id;
                $add->save();

            }
        }
        $registo->save();
    }

}
