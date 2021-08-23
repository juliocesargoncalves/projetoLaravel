<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller{

    public function principal(){

        $motivo = MotivoContato::all();
        return view('site/principal',['motivo'=> $motivo]);
    }
}
