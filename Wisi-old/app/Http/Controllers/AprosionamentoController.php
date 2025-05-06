<?php

namespace App\Http\Controllers;

use App\Aprovisionamento;
use App\Classes\randomID;
use App\Http\Requests\AprosionamentoFormValidation;
use App\Notifications\AprosionamentoCompleted;
use App\Notifications\AprosionamentoProcessing;
use App\Notifications\AprosionamentoRequested;
use App\PedidoDetalhe;
use App\Produto;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;
use App\User;

class AprosionamentoController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:10', ['only' => ['index','edit','update']]);
    }

    public function index(){

        return view('forms.aprovisionamento.index')
            ->with('results',Aprovisionamento::RetriveAllDados()->whereBetween('estado',[1,2])->orderBy('created_at','DESC')->get());
    }
    public function create()
    {
        return view('forms.aprovisionamento.create')
            ->with('registos',Produto::orderBy('familia_id')->orderBy('nome')->get());
    }

    public function store(Request $request)
    {
        $random = new randomID();
        $pedido = Aprovisionamento::create([
            'estado' => 1,
            'observacao' =>$request->observacao,
            'user_id' => Auth::user()->id
        ]);
$conta = 0;
        for ($i = 0, $iMax = \count($request->produtos); $i < $iMax; $i++) {
           if (!empty($request->produtos[$i]))
           {
               $conta = $conta +1;
               $add = new PedidoDetalhe();
               $add->id = $random->generateID();
               $add->aprosionamento_id = $pedido->id;
               $add->produto_id = $request->produtos[$i];
               $add->quantidade = $request->quantidade[$i];
               $add->quantidade_entregue = 0;
               $add->save();
           }
        }

//        $dados = Aprovisionamento::DetalhesForNotification($pedido->id)->get();
//        $user = User::findOrFail(Auth::user()->id);
//
//        $user->notify(new AprosionamentoRequested($user, $dados));

        Session::flash('success','Pedido foi executado com sucesso.');
        return redirect()->back();
    }
    public function edit($id){

        return view('forms.aprovisionamento.edit')
            ->with('registos',PedidoDetalhe::where('aprosionamento_id',$id)->get())
            ->with('id',PedidoDetalhe::where('aprosionamento_id',$id)->first());
    }
    public function update(Request $request,$id){
        try {
            for ($i = 0, $iMax = \count($request->id); $i < $iMax; $i++) {
                $pedido = PedidoDetalhe::find($request->id[$i]);
                $pedido->quantidade_entregue = $request->quantidade[$i];
                $pedido->save();
            }
            Session::flash('success','As quantidades foram alteradas com sucesso');
            $this->processing($id);
        }catch (\Exception $e){
            Session::flash('error','Registo não foi devidamente alterado.');
        }
        return redirect()->route('aprovisionamento.index');

    }
    public function basicSearchForm(){

        return view('forms.aprovisionamento.basic-search')
            ->with('utilizador',Aprovisionamento::UsersWithAprosionamento()->orderBy('nome','ASC')->get())
            ->with('produtos',Produto::orderBy('nome')->get());
    }

    public function basicSearch(Request $request){
        if (empty($request->utilizador) && empty($request->tag) && empty($request->data) && empty($request->produto)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        $query = Aprovisionamento::BasicSearchQuery($request->utilizador,$request->tag[0],$request->data,$request->produto)->orderBy('created_at','DESC')->get();
        if ($query->count() >0)
            return view('forms.aprovisionamento.index')->with('results',$query)->with('pedido',Aprovisionamento::DetalhesForChangeEntregueQuantidade()->get());
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }

    public function processing($id){
        $registo = Aprovisionamento::find($id);
        $user = User::find($registo->user_id);
        $dados = Aprovisionamento::DetalhesForNotification($id)->get();
        try {
            $user->notify(new AprosionamentoCompleted($user, $dados));
        } catch (\Exception $e) {
            Session::flash('error','Email de confirmação não foi enviado.');
        }
        $registo->estado = 2;
        $registo->save();
        Session::flash('success','Pedido foi alterado para em processamento');
        return redirect()->route('aprovisionamento.index');
    }

    public function completed($id){
        $registo = Aprovisionamento::find($id);
//        $user = User::find($registo->user_id);
//        $dados = Aprovisionamento::DetalhesForNotification($id)->get();
//        try {
//            $user->notify(new AprosionamentoCompleted($user, $dados));
//        } catch (\Exception $e) {
//            Session::flash('error','Email de confirmação não foi enviado.');
//        }
        $registo->estado = 3;
        $registo->save();
        Session::flash('success','Pedido foi dado como concluido');
        return redirect()->route('aprovisionamento.index');
    }
    public function nullified($id){
        $registo = Aprovisionamento::find($id);
//        $user = User::find($registo->user_id);
//        $dados = Aprovisionamento::DetalhesForNotification($id)->get();
//        try {
//            $user->notify(new AprosionamentoCompleted($user, $dados));
//        } catch (\Exception $e) {
//            Session::flash('error','Email de confirmação não foi enviado.');
//        }
        $registo->estado = 4;
        $registo->save();
        Session::flash('success','Pedido foi dado como anulado');
        return redirect()->route('aprovisionamento.index');
    }
    public function createPDF($id){
        $dados = Aprovisionamento::DetalhesForNotification($id)->get();
        return view('forms.aprovisionamento.pdf')->with('dados',$dados);
    }

    public function menu($id){
        $construcao = array();

        $construcao[] = array(
            'familia_id','=',$id
        );

        $query = Produto::where($construcao[0][0],$construcao[0][1],$construcao[0][2])->orderBy('nome')->get();
        return view('forms.aprovisionamento.produtos')->with('results',$query);
    }

    public function estado_por_id($id){

        $construcao = array();

        $construcao[] = array(
            'estado','=',$id
        );

        $query = Aprovisionamento::RetriveAllDados()->where($construcao[0][0],$construcao[0][1],$construcao[0][2])->orderBy('created_at','DESC')->get();
        return view('forms.aprovisionamento.index')->with('results',$query);
    }

    public function estatistica(){
        return view('forms.aprovisionamento.estatistica');
    }

    public function estatisticaResultados(Request $request){
        $notificadasConta = 0;
        $concludiasConta =0;
        $anuladasConta =0;

        if (!empty($request->inicial) && !empty($request->final)){
            $resultado = Aprovisionamento::whereBetween('created_at',[$request->inicial,$request->final])->get();
        }
        if (!empty($request->inicial) && empty($request->final))
        {
            $resultado = Aprovisionamento::whereDate('created_at',$request->inicial)->get();
        }
        if (empty($request->inicial) && empty($request->final))
        {
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        foreach ($resultado as $item) {
            if ($item->estado ==2)
                ++$notificadasConta;
            if ($item->estado ==3)
                ++$concludiasConta;
            if ($item->estado==4)
                ++$anuladasConta;
        }
        return view('forms.aprovisionamento.estatistica-resultado')
            ->with('notificadas',$notificadasConta)
            ->with('concluidas',$concludiasConta)
            ->with('anuladas',$anuladasConta)
            ->with('inicio',$request->inicial)
            ->with('fim',$request->final);
    }


}
