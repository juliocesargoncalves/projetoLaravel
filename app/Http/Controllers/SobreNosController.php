<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ValidaTokenMiddleware;
use Illuminate\Http\Request;

class SobreNosController extends Controller
{
    public function __construct()
    {   //chamando o middleware pelo seu apelido, que foi definido no kerne.php
      // $this->middleware('log.acesso');
    }
    public function sobreNos(){
        return view('site.sobre-nos');
    }
}
