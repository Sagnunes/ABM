<?php

namespace App\Http\Controllers;

use App\User;
use App\Utente;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Auth;
use Session;
class LeitoresController extends Controller
{
    public function create(){
        return view('forms.leitores.create');
    }
    public function store(Request $request){
        $user = User::find(Auth::user()->id);
        if ($user->profile->servico_id == 1){
            $sala = 2;
        }elseif($user->profile->servico_id == 6){
            $sala = 1;
        }
        else
        {
            Session::flash('error','Não tem permissões para inserir nesta área.');
            return redirect()->back();
        }
        try{
                Utente::create([
                    'nLeitor'=>$request->numero,
                    'user_id'=>Auth::user()->id,
                    'local'=>$sala
                ]);

            Session::flash('success','Registo adicionado com sucesso.');
        }catch (\Exception $e){
            Session::flash('error','Registo não foi adiconado!');
        }

        return redirect()->back();
    }

    public function showArquivo(){
        $now = Carbon::now();
        return view('forms.leitores.arquivo')->with('results',Utente::where('local',1)
            ->where('created_at','LIKE',$now->toDateString().'%')->orderBy('created_at','DESC')->get());
    }

    public function showBiblioteca(){
        Carbon::setLocale('pt');
        $now = Carbon::now();
        return view('forms.leitores.biblioteca')->with('results',Utente::where('local',2)
            ->where('created_at','LIKE',$now->toDateString().'%')->orderBy('created_at','DESC')->get());
    }
    public function basicSearchForm(){

        return view('forms.leitores.basic-search');
    }
    public function basicSearch(Request $request){
        $date_from = Carbon::parse($request->input('inicial'))->startOfDay();
        $date_to = Carbon::parse($request->input('final'))->endOfDay();

//        dd($date_from,$date_to);
        if (empty($request->tag)){
            Session::flash('error','Obrigatório escolher o local');
            return redirect()->back();
        }

        if (!empty($request->inicial) && !empty($request->final)){
            $resultado = Utente::where('created_at','>=',$date_from)->where('created_at','<=',$date_to)->where('local',$request->tag[0])->get();
        }
        if (!empty($request->inicial) && empty($request->final))
        {
            $resultado = Utente::whereDate('created_at',$request->inicial)->where('local',$request->tag[0])->get();
        }
        if (empty($request->inicial) && empty($request->final))
        {
            Session::flash('error','Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        if ($resultado->count() >0)
            return view('forms.leitores.index')->with('results',$resultado)->with('data',$request->data)->with('local',$request->tag);
        else{
            Session::flash('error','Nenhum dado encontrado');
            return redirect()->back();
        }

    }

    public function destroy($id)
    {
        $registo = Utente::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
