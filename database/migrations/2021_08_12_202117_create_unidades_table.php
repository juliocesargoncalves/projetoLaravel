<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('unidade',5);
            $table->string('descricao',50);
        });

        //adicionando relacionamento 
        Schema::table('produtos', function(Blueprint $table){

            //criando campo chave estrangeira na tabela produtos
            $table->unsignedBigInteger('unidade_id');

            //refencia do campo chave estrangeira na tabela produto, indicando qual campo e qual tabela
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });

        Schema::table('produto_detalhes',function(Blueprint $table){

            $table->unsignedBigInteger('unidade_id');
            $table->foreign('unidade_id')->references('id')->on('unidades');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto_detalhe', function(Blueprint $table){
            //deletando a chave estrangeria
            $table->dropForeign('produto_detalhe_unidade_id_foreign');
            //deletando a coluna
            $table->dropColumn('unidade_id');
        });

        Schema::table('produtos', function(Blueprint $table){

            $table->dropForeign('produtos_unidade_id_foreign');
            $table->dropColumn('unidade_id');
        });

        Schema::dropIfExists('unidades');
    }
}
