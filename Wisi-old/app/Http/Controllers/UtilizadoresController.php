<?php

namespace App\Http\Controllers;

use App\Acessos;
use App\Http\Requests\UpdateAccountFormValidation;
use App\Http\Requests\UpdateProfileFormValidation;
use App\Http\Requests\UtilizadoresFormValidation;
use App\Modulos;
use App\Profile;
use App\Servico;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Storage;
use Session;
class UtilizadoresController extends Controller
{

    public function index(){
        return view('auth.index')
            ->with('results',User::orderBy('status','ASC')->orderBy('name','ASC')->get())
            ->with('servicos',Servico::orderBy('nome','ASC')->get());
    }
    public function create(){
        return view('auth.register')
            ->with('modulos',Modulos::all());
    }

    public function show($email){
        $user = User::where('email',$email)->first();
        return view('auth.profile')->with('user',$user);
    }
    public function account($email){
        $user = User::where('email',$email)->first();
        return view('auth.account')->with('user',$user);
    }
    public function saveAccount(UpdateAccountFormValidation $request,$id){
        $utilizador = User::findOrFail($id);
        try{
                $utilizador->password = bcrypt($request->password);
            $utilizador->save();
            Session::flash('success','Os dados da conta foram alterados com sucesso.');

        }catch (\Exception $e){
            Session::flash('error','Os dados não foram alterados.');

        }

        return redirect()->route('utilizadores.show',['email'=>$utilizador->email]);
    }

    public function update(UpdateProfileFormValidation $request,$id){

        $utilizador = User::findOrFail($id);
        $utilizador->name = $request->nome;

        $profile = Profile::where('user_id',$id)->first();
        $profile->categoria_profissional = $request->categoria;
        $profile->telefone = $request->telefone;
        $profile->morada = $request->morada;
        $profile->cdp = $request->cdp;

        if ($request->hasFile('imagem'))
        {
            Storage::delete($profile->imagem);
            $featured = $request ->imagem;
            $featured_new_name = time().$featured->getClientOriginalName();
            $featured->move('storage/uploads/profiles',$featured->getClientOriginalName());
            $profile->imagem = 'storage/uploads/profiles/'.$featured->getClientOriginalName();
        }
        $utilizador->save();
        $profile->save();

        return redirect()->back();
    }
    public function validation(Request $request,$id){
        if (!$request->has('validacao'))
        {
            Session::flash('error','Tem de escolher a opção de validar o utilizador.');
            return redirect()->back();
        }
        if (empty($request->local)){
            Session::flash('error','Tem de escolher o local que essa pessoa trabalha.');
            return redirect()->back();
        }
        $registo = User::find($id);
        $profile_user = Profile::where('user_id',$registo->id)->first();
        $registo->status = 1;
        $profile_user->servico_id = $request->local;
        $profile_user->save();
        $registo->save();
        Session::flash('success','Conta foi validada com sucesso');
        return redirect()->route('utilizadores.index');
    }
    public function destroy($id)
    {
        $registo = User::find($id);
        $registo->delete();
        Session::flash('success','Registo foi apagado.');
        return redirect(url()->previous());
    }
}
