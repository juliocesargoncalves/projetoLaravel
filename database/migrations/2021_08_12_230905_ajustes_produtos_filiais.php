<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AjustesProdutosFiliais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('filiais',function(Blueprint $table){

            $table->id();
            $table->string('nome',50);
            $table->timestamps();
        });

        Schema::create('produto_filiais',function(Blueprint $table){

            $table->id();
            $table->unsignedBigInteger('filial_id');
            $table->unsignedBigInteger('produto_id');
            $table->float('sale_price',8,2);
            $table->integer('minimum_stock');
            $table->integer('maximum_stock');
            $table->timestamps();
            $table->foreign('filial_id')->references('id')->on('filiais');
            $table->foreign('produto_id')->references('id')->on('produtos');
        });

        Schema::table('produtos',function(Blueprint $table){
            $table->dropColumn(['sale_price','minimum_stock','maximum_stock']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos',function(Blueprint $table){
            $table->float('sale_price',8,2);
            $table->integer('minimum_stock');
            $table->integer('maximum_stock');
        });

        Schema::dropIfExists('produto_filiais');
        Schema::dropIfExists('filiais');
    }
}
