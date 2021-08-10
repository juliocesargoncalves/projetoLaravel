<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[\App\Http\Controllers\PrincipalController::class,'principal'])->name('site.index');//Aplicando nome em uma rota
Route::get('/contato',[\App\Http\Controllers\ContatoController::class,'contato']);
Route::get('/sobrenos',[\App\Http\Controllers\SobreNosController::class,'sobrenos']);

//Agrupamentos de rotas, acessa via localhost:3000/app/nome da rota
Route::prefix('/app')->group(function(){
    Route::get('/login', function(){
        return 'Tela de login';
    });
    
    Route::get('/clientes', function(){
        return 'Tela de clientes';
    });
    
    Route::get('/fornecedores', function(){
        return 'Tela de fornecedores';
    });
    
    Route::get('/produtos', function(){
        return 'Tela de produtos';
    });
});
//Passando parametro para controller atraves da rota
Route::get('/rota1/{p1}/{p2}',[\App\Http\Controllers\TesteController::class,'teste'])->name('site.rota1');




//Rota contato com parametros
Route::get('/contato/{nome}/{categoria_id}',function(string $nome, int $categoria_id){
    echo "Rota com parâmetros : " . strtoupper($nome) . " - id passado : " .$categoria_id;
})->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');//expressão regular dizendo que tem ser um parametro inteiro
