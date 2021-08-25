<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AlterTableAddFkMotivoContatos extends Migration
{
    
    public function up()
    {
        Schema::table('site_contatos', function(Blueprint $table){
            $table->unsignedBigInteger('motivo_id')->after('mensagem');
        });

        DB::update('update site_contatos set motivo_id = motivo');

        Schema::table('site_contatos',function(Blueprint $table){
            $table->foreign('motivo_id')->references('id')->on('motivo_contatos');
            $table->dropColumn('motivo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       Schema::table('site_contatos', function(Blueprint $table){
            $table->integer('motivo');
            $table->dropForeign('site_contatos_motivo_id_foreign');
        });

        DB::statement('update site_contatos set motivo = motivo_id');

        Schema::table('site_contatos', function(Blueprint $table){
            $table->dropColumn('motivo_id');
        });
    }
}
