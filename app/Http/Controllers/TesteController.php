<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(){
        //echo "A soma de $valor1 + $valor2 é : ". ($valor1 + $valor2);
        
        return view('site.teste');
    }
}
