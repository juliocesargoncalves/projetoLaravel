<?php

use Illuminate\Support\Facades\Route;

Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');//Aplicando nome em uma rota
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato'])->name('site.contato')->middleware('log.acesso');
Route::post('/contato',[\App\Http\Controllers\ContatoController::class,'salvar'])->name('site.contato');
Route::get('/sobrenos',[\App\Http\Controllers\SobreNosController::class,'sobrenos'])->name('site.sobrenos');

//Agrupamentos de rotas, acessa via localhost:3000/app/nome da rota
Route::middleware('log.acesso','autentificacao')->prefix('/app')->group(function(){
    Route::get('/login', function(){ return 'Tela de login';})->name('site.login');
    Route::get('/clientes', function(){ return 'Tela de clientes';})->name('site.clientes');
    Route::get('/fornecedores', function(){ return 'Tela de fornecedores';})->name('site.fornecedores');
    Route::get('/produtos', function(){ return 'Tela de produtos';})->name('site.produtos');
});

//Passando parametro para controller atraves da rota
Route::get('/rota1',[\App\Http\Controllers\TesteController::class,'teste'])->name('site.rota1');

//Rota contato com parametros
Route::get('/contato/{nome}/{categoria_id}',function(string $nome, int $categoria_id){
    echo "Rota com parâmetros : " . strtoupper($nome) . " - id passado : " .$categoria_id;
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');//expressão regular dizendo que tem ser um parametro inteiro
