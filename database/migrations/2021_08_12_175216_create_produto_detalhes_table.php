<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutoDetalhesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produto_detalhes', function (Blueprint $table) {
            $table->id();
            //o tipo do campo da chave estrangeira, deve o mesmo da tabela referência
            $table->unsignedBigInteger('produto_id');
            $table->decimal('comprimento',8,2);
            $table->decimal('largura',8,2);
            $table->decimal('altura',8,2);
            $table->timestamps();

            //chave estrangeira da tabela produtos
            $table->foreign('produto_id')->references('id')->on('produtos');
            
            //parametro unique serve para que não se repita o mesmo id
            $table->unique('produto_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produto_detalhes');
    }
}
