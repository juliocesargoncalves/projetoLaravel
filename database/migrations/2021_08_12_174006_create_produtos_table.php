<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->text('descricao')->nullable();
            $table->decimal('peso', 8,2)->nullable();//peso
            $table->decimal('preco_venda', 8,2)->default(0.01);
            $table->integer('estoque_minimo')->default(1);//estoque minimo
            $table->integer('estoque_maximo')->default(1);//estque maximo
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}
