<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSiteContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_contatos', function (Blueprint $table) {

            $table->id();
            $table->string('name', 50);
            $table->string('telefone',30);
            $table->string('email',50);
            $table->integer('motivo_id');
            $table->text('mensagem');
            $table->timestamps();
            $table->foreign('motivo_id')->references('id')->on('motivo_contatos');
        });

        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('site_contatos');
    }
}
