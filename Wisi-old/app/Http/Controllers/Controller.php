<?php

namespace App\Http\Controllers;

use App\Aprovisionamento;
use App\Deposito;
use App\User;
use Illuminate\Support\Facades\Session;
use View;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
    }

    public function flashSessionInformation($alert,$message){

        return Session::flash($alert,$message);
    }
}
