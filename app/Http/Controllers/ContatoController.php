<?php

namespace App\Http\Controllers;

use App\Http\Middleware\ValidaTokenMiddleware;
use App\Models\MotivoContato;
use App\Models\SiteContato;
use Illuminate\Http\Request;

class ContatoController extends Controller{

    public function __construct()
    {
        
     
    }

    public function contato(){

        $motivo = MotivoContato::all();
        $titulo = 'Formulario de contato';
        return view('site.contato', ['titulo' => $titulo, 'motivo'=> $motivo]);
    }

    public function salvar(Request $request){

       $request->validate(
        [
            'nome' => 'required|min:3|max:50|unique:site_contatos',
            'telefone' => 'required|unique:site_contatos',
            'email' => 'required|email|unique:site_contatos',
            'motivo_id' => 'required',
            'mensagem' => 'required'
        ],

        [
            'required' => 'O campo :attribute é obrigatório',
            //'nome.required' => 'O Campo nome é obrigatório',
            'nome.min' => 'O campo nome dever ter no minimo 3 caracteres',
            'nome.max' => 'O campo nome deve ter no maximo 50 caracteres',
            'nome.unique' => 'Esse nome já existe no banco de dados',

            //'telefone.required' => 'O Campo telefone e obrigatório',
            'telefone.unique' => 'Telefone já cadastrado, por favor insira outro telefone',

            //'email.required' => 'O campo e-mail e obrigatório',
            'email.unique' => 'E-mail já cadastrado, por favor insira outro e-mail',

            'motivo_id.required' => 'É obrigatório selecionar uma alternativa',

           // 'mensagem.required' => 'Necessário escrever a mesangem desejada'
            
        ]);

      // SiteContato::create($request->all());
      

       $contato = new SiteContato();
       $contato->nome = $request->input('nome');
       $contato->telefone = $request->input('telefone');
       $contato->email = $request->input('email');
       $contato->motivo_id = $request->input('motivo_id');
       $contato->mensagem = $request->input('mensagem');
       $contato->save();

        return redirect()->route('site.index');
    }
}
