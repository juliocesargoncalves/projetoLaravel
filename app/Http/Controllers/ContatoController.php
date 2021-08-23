<?php

namespace App\Http\Controllers;

use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller{

    public function contato(){
        $motivo = MotivoContato::all();

        $titulo = 'Formulario de contato';
        return view('site.contato', ['titulo' => $titulo, 'motivo'=> $motivo]);
    }

    public function salvar(Request $request){

       $request->validate([

           'nome' => 'required|min:3|max:50',
           'telefone' => 'required',
           'email' => 'required',
           'mensagem' => 'required'

       ]);

      /* $contato = new SiteContato();
       $contato->name = $request->input('nome');
       $contato->telefone = $request->input('telefone');
       $contato->email = $request->input('email');
       $contato->motivo = $request->input('motivo');
       $contato->mensagem = $request->input('mensagem');
       $contato->save();*/
    }
}
