<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests\assiduidadeFormValidation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\assiduidades;
use App\viewAssiduidadeData;
use Auth;
use Carbon;
class assiduidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Respons
     */
    public function index(Request $request)
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    public function basicSearchForm()
    {
       
        $query = DB::table('users')->where('nCartao', '!=', '')->WhereNotNull('nCartao')->orderBy('name', 'ASC')->get();
        $dataFinal = viewAssiduidadeData::first();
        return view('forms.assiduidade.basic-search')->with('registos', $query)->with('data', $dataFinal);
    }

    public function userSearchForm()
    {
        $dataFinal = viewAssiduidadeData::first();
        return view('forms.assiduidade.user-search')->with('data', $dataFinal);
    }

    public function basicSearch(Request $request)
    {
        if (empty($request->dataInicial) && empty($request->dataFinal)) {
            Session::flash('error', 'ERRO! - Tem de introduzir dados no formulario de pesquisa');
            return redirect()->back();
        }
        $dateI = date('Y/m/d', strtotime($request->dataInicial));
        $dateF = date('Y/m/d', strtotime($request->dataFinal));
        $dataFinal = viewAssiduidadeData::first();
        if ($request->has('nrCartao')) {
            $query = Assiduidades::BasicsSearchQuery($dateI, $dateF, $request->nrCartao)->get();
        } else {
            $query = Assiduidades::BasicsSearchQuery($dateI, $dateF,Auth::user()->nCartao)->orderBy('datahora', 'ASC')->get();
        }
        if ($request->has('nrCartao') and $query->count() > 0) {
            return view('forms.assiduidade.index')->with('dados', $query)->with('data', $dataFinal);
        } elseif ($query->count() > 0) {

            return view('forms.assiduidade.index')->with('dados', $query)->with('data', $dataFinal);
        } else {
            Session::flash('error', 'Nenhum dado encontrado');
            return redirect()->back();
        }
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
//
    }

    public function registos()
    {
// $registo=assiduidade::all() ;
//  return view ('assiduidade.result')->with ('dados',$registo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
//
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
//
    }
}