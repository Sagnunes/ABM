<?php

namespace App\Http\Controllers;

use App\Qualidade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Session;
use App\Processo;
class QualidadeController extends Controller
{
    public function index(){

        return view('forms.qualidade.index')
            ->with('manual',Qualidade::where('processo_id',1)->where('visivel',1)->get())
            ->with('pgq_1',Qualidade::where('processo_id',2)->where('visivel',1)->get())
            ->with('pgq_2',Qualidade::where('processo_id',3)->where('visivel',1)->get())
            ->with('pgq_3',Qualidade::where('processo_id',4)->where('visivel',1)->get())
            ->with('pgq_4',Qualidade::where('processo_id',5)->where('visivel',1)->get())
            ->with('pgq_5',Qualidade::where('processo_id',6)->where('visivel',1)->get())
            ->with('pgq_6',Qualidade::where('processo_id',7)->where('visivel',1)->get())
            ->with('pgq_7',Qualidade::where('processo_id',8)->where('visivel',1)->get());
    }


    public function gestao(){
        return view('forms.qualidade.gestao')
            ->with('results',Qualidade::all())
            ->with('processos',Processo::all());
    }
    public function store(Request $request){


        $featured = $request->ficheiro;
        $featured_new_name = time() . $featured->getClientOriginalName();
        $featured->move('storage/uploads/qualidade', $featured_new_name);

        Qualidade::create([
            'processo_id'=>$request->processo,
            'grupo'=>$request->grupo,
            'visivel'=>0,
            'titulo'=>$request->titulo,
            'url'=>'storage/uploads/qualidade/'.$featured_new_name,
            'versao'=>$request->versao
        ]);
        Session::flash('success','Adicionado com sucesso.');
        return redirect()->back();
    }

    public function edit($id){
        return view('forms.qualidade.edit')
            ->with('registo',Qualidade::find($id))
            ->with('processos',Processo::all());
    }

    public function seen($id){
        $registo = Qualidade::find($id);

        $registo->visivel = 1;
        $registo->save();

        Session::flash('success','Documento está agora visivel.');
        return redirect()->back();
    }

    public function unseen($id){
        $registo = Qualidade::find($id);
        $registo->visivel = 0;
        $registo->save();

        Session::flash('success','Documento está agora invisivel.');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $registo = Qualidade::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }

}
