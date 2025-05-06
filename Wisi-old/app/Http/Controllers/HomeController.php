<?php

namespace App\Http\Controllers;

use App\Aprovisionamento;
use App\Casamento;
use App\cmfunchal;
use App\Deposito;
use App\Familia;
use App\Financa;
use App\Judicial;
use App\Nascimento;
use App\Noticias;
use App\Notoriais;
use App\Obito;
use App\Passaporte;
use App\ProcessoObra;
use App\Produto;
use App\Tarefa;
use App\User;
use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        Carbon::setLocale('pt');
        return view('home')
            ->with('noticias',Noticias::orderBy('created_at','DESC')->limit(5)->get())
            ->with('tarefas',Tarefa::where('user_id',Auth::user()->id)->where('estado',1)->get())
            ->with('aprosionamentos',Aprovisionamento::orderBy('created_at','DESC')->orderBy('estado')->where('estado',1)->limit(30)->get())
            ->with('produtos_stock_fim',Produto::all())
            ->with('aprosionamentos_completado',Aprovisionamento::where('estado','=',3)->get())
            ->with('depositos',Deposito::orderBy('created_at','DESC')->where('estado',1)->get())
            ->with('deposito_processamento',Deposito::where('estado','=',4)->get())
            ->with('deposito_completado',Deposito::where('estado','=',5)->get());

    }
}
