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

       $request->validate(
        [

           'nome' => 'required|min:3|max:50',
           'telefone' => 'required',
           'email' => 'required|email',
           'motivo_id' => 'required',
           'mensagem' => 'required'
        ],
        [
            'nome.required' => 'Esse campo e obrigatório',
            'nome.min' => 'O campo nome dever ter no minimo 3 caracteres'
        ]);

      // SiteContato::create($request->all());
      

       $contato = new SiteContato();
       $contato->name = $request->input('nome');
       $contato->telefone = $request->input('telefone');
       $contato->email = $request->input('email');
       $contato->motivo_id = $request->input('motivo_id');
       $contato->mensagem = $request->input('mensagem');
       $contato->save();

        return redirect()->route('site.index');
    }
}
