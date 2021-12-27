<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->bigIncrements('rol_id');
            $table->string('rol_name',50);
            $table->string('rol_label',200);
            $table->timestamps();
        });
        Schema::create('roles_user', function (Blueprint $table) {
            $table->bigIncrements('rus_id');
            $table->unsignedBigInteger('rus_usr_id');
            $table->unsignedBigInteger('rus_rol_id');
            $table->timestamps();
        });
        Schema::table('roles', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('roles_user', function (Blueprint $table) {
            $table->softDeletes();
            $table->foreign('rus_usr_id')->references('usr_id')->on('users')->onDelete('cascade');
            $table->foreign('rus_rol_id')->references('rol_id')->on('roles')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('roles_user');
        Schema::dropIfExists('roles');
    }
}
