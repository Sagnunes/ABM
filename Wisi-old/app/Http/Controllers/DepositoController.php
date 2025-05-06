<?php

namespace App\Http\Controllers;

use App\Classes\randomID;
use App\Deposito;
use App\Fundo;
use App\Http\Requests\DepositoFormValidation;
use App\Notifications\DepositoProcessing;
use App\Notifications\DepositoRequested;
use App\User;
use App\ViewDepositoContaSeguinte;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Auth;

class DepositoController extends Controller
{
    private $lido = 2;
    private $notificar = 3;
    private $porDevolver = 4;
    private $concluido = 5;
    private $anulado = 6;

    public function index(){
        return view('forms.deposito.index')
            ->with('results',Deposito::orderBy('created_at','DESC')->get())
            ->with('atrasados',Deposito::where('dataDevolucao','<',Carbon::now()->toDateString())->get());
    }
    public function create(){
        return view('forms.deposito.create')
            ->with('registos',Fundo::orderBy('nome')->get());
    }

    public function store(DepositoFormValidation $request){
        $randomID = new randomID();
        $now = Carbon::now();
        if ($request->dataDevolucao < $now->toDateString())
        {
            Session::flash('info','A data de devolução não pode ser inferior a data atual.');
            return redirect()->back();
        }
        try{
            $cod_referencia = ViewDepositoContaSeguinte::first();
            $registo = Deposito::create([
                'id'=>$randomID->generateID(),
                'fundo_id' => $request->fundo,
                'titulo' => $request->titulo,
                'cotaI'=>$request->cotaInicial,
                'cotaF'=>$request->cotaFinal,
                'totalUI'=>$request->totalUI,
                'cod_referencia'=>$cod_referencia->seguinte.'/'.$now->year,
                'D'=>$request->D,
                'B'=>$request->B,
                'E'=>$request->E,
                'P'=>$request->P,
                'dataDevolucao'=>$request->dataDevolucao,
                'observacao'=>$request->observacao,
                'user_id'=>Auth::user()->id
            ]);
            $user = User::findOrFail(Auth::user()->id);
            try {
                $user->notify(new DepositoRequested($registo));
            } catch (\Exception $e) {
                Session::flash('error','Email de confirmação do pedido não foi enviado');
            }
            Session::flash('success','O documento foi requisitado com sucesso.');

        }catch (\Exception $e){
            Session::flash('error','Registo não foi devidamente criado.');
        }
        return redirect()->back();
    }

    public function edit($id){
        return view('forms.deposito.edit')->with('registo',Deposito::find($id));
    }

    public function update(Request $request,$id){
        $url = $request->input('url');
        $registo = Deposito::find($id);
        $registo->gestor_informacao = $request->documentos;
        $registo->save();
        return redirect($url);

    }

    public function basicSearchForm(){

        return view('forms.deposito.basic-search')
            ->with('fundo',Fundo::all())
            ->with('utilizador',Deposito::UsersWithDeposito()->orderBy('nome','ASC')->get());
    }

    public function basicSearch(Request $request){


        if (empty($request->nRequisicao) && empty($request->cota) && empty($request->fundo) && empty($request->requisitante) && empty($request->tag)){
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        $query = Deposito::BasicSearchQuery($request->nRequisicao,$request->cota,$request->fundo,$request->requisitante,$request->tag[0])->orderBy('created_at','DESC')->get();

        if ($query->count() >0)
            return view('forms.deposito.index')->with('results',$query);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }

    public function changeStatusOfDeposito($id,$status){
        $registo = Deposito::find($id);
        switch ($status){
            case $status == 2 :
                $registo->estado = $this->getLido();
                $this->flashSessionInformation('info','Requisição foi dada como lida.');
                break;
            case $status == 3:
                $registo->estado = $this->getNotificar();
                $this->sendNotificationToUserWithStatusProcessing($registo);
                $this->flashSessionInformation('info','Utilizador foi notificado.');
                break;
            case $status == 4:
                $registo->estado = $this->getPorDevolver();
                break;
            case $status == 5:
                $registo->estado = $this->getConcluido();
                $this->flashSessionInformation('info','Requisição concluida.');
                break;
            case $status == 6:
                $registo->estado = $this->getAnulado();
                $this->flashSessionInformation('info','Requisição anulada.');
                break;
        }

        $registo->ultimo_user_id_gestao = Auth::user()->id;
        $registo->save();
        return redirect(url()->previous());

    }

    public function createPDF($id){
        $dado = Deposito::find($id);
        return view('forms.deposito.pdf')->with('dados',$dado);
    }

    public function consulta($id){
        switch ($id){
            case $id == 1:
                return view('forms.deposito.index')->with('results',Deposito::where('estado','<=',3)->orderBy('created_at','DESC')->get());
            case $id == 4:

                return view('forms.deposito.index')->with('results',Deposito::where('estado','=',4)->orderBy('created_at','DESC')->get());
            case $id == 5:

                return view('forms.deposito.index')->with('results',Deposito::where('estado','=',5)->orderBy('created_at','DESC')->get());
            case $id == 6:

                return view('forms.deposito.index')->with('results',Deposito::where('estado','=',6)->orderBy('created_at','DESC')->get());
        }
        return redirect()->back();
    }

    public function estatistica(){
        return view('forms.deposito.estatistica');
    }
    public function utilizadorEstatistica(){
        return view('forms.deposito.user-estatistica');
    }

    public function utilizadorEstatisticaResultado(Request $request){


        $date_from = Carbon::parse($request->input('inicial'))->startOfDay();
        $date_to = Carbon::parse($request->input('final'))->endOfDay();

        $notificadasConta = 0;
        $concludiasConta =0;
        $anuladasConta =0;

        if (!empty($request->inicial) && !empty($request->final)){
            $resultado = Deposito::whereBetween('updated_at',[$date_from,$date_to])->where('ultimo_user_id_gestao','=',Auth::user()->id)->orderBy('updated_at')->get();
        }
        if (!empty($request->inicial) && empty($request->final))
        {
            $resultado = Deposito::whereDate('updated_at',$request->inicial)->where('ultimo_user_id_gestao','=',Auth::user()->id)->orderBy('updated_at')->get();
        }
        if (empty($request->inicial) && empty($request->final))
        {
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        foreach ($resultado as $item) {
            if ($item->estado ==4)
                $notificadasConta+=$item->totalUI;
            if ($item->estado ==5)
                $concludiasConta+=$item->totalUI;
            if ($item->estado==6)
                ++$anuladasConta;
        }

        return view('forms.deposito.estatistica-resultado')
            ->with('notificadas',$notificadasConta)
            ->with('concluidas',$concludiasConta)
            ->with('anuladas',$anuladasConta)
            ->with('inicio',$request->inicial)
            ->with('fim',$request->final);
    }

    public function estatisticaResultados(Request $request){
        $date_from = Carbon::parse($request->input('inicial'))->startOfDay();
        $date_to = Carbon::parse($request->input('final'))->endOfDay();
        $notificadasConta = 0;
        $concludiasConta =0;
        $anuladasConta =0;

        if (!empty($request->inicial) && !empty($request->final)){
            $resultado = Deposito::whereBetween('updated_at',[$date_from,$date_to])->get();
        }
        if (!empty($request->inicial) && empty($request->final))
        {
            $resultado = Deposito::whereDate('updated_at',$request->inicial)->get();
        }
        if (empty($request->inicial) && empty($request->final))
        {
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }

        foreach ($resultado as $item) {
            if ($item->estado ==4)
                $notificadasConta+=$item->totalUI;
            if ($item->estado ==5)
                $concludiasConta+=$item->totalUI;
            if ($item->estado==6)
                ++$anuladasConta;
        }
        return view('forms.deposito.estatistica-resultado')
            ->with('notificadas',$notificadasConta)
            ->with('concluidas',$concludiasConta)
            ->with('anuladas',$anuladasConta)
            ->with('inicio',$request->inicial)
            ->with('fim',$request->final);
    }

    /**
     * @return int
     */
    public function getLido(): int
    {
        return $this->lido;
    }

    /**
     * @return int
     */
    public function getNotificar(): int
    {
        return $this->notificar;
    }

    /**
     * @return int
     */
    public function getPorDevolver(): int
    {
        return $this->porDevolver;
    }

    /**
     * @return int
     */
    public function getConcluido(): int
    {
        return $this->concluido;
    }

    /**
     * @return int
     */
    public function getAnulado(): int
    {
        return $this->anulado;
    }

    /**
     * @param $registo
     */
    public function sendNotificationToUserWithStatusProcessing($registo): void
    {
        $user = User::find($registo->user_id);
        try {
            $user->notify(new DepositoProcessing($registo));
        } catch (\Exception $e) {
            Session::flash('error', 'Email de confirmação não foi enviado.');
        }
    }
}
