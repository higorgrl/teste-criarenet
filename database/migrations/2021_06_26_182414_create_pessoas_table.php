<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePessoasTable extends Migration
{

    public function up()
    {
        Schema::create('pessoas', function (Blueprint $table) {
            $table->bigIncrements('pes_id');
            $table->string('pes_nome');
            $table->string('pes_cpf');
            $table->string('pes_telefone');
            $table->string('pes_email');
            $table->timestamps();
        });

        Schema::table('pessoas', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pessoas');
    }
}
