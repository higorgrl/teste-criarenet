<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionsTable extends Migration
{
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->bigIncrements('per_id');
            $table->string('per_name',50);
            $table->string('per_label',200);
            $table->timestamps();
        });
        Schema::create('permissions_roles', function (Blueprint $table) {
            $table->bigIncrements('pro_id');
            $table->unsignedBigInteger('pro_rol_id');
            $table->unsignedBigInteger('pro_per_id');
            $table->timestamps();
        });
        Schema::table('permissions', function (Blueprint $table) {
            $table->softDeletes();
        });
        Schema::table('permissions_roles', function (Blueprint $table) {
            $table->softDeletes();
            $table->foreign('pro_rol_id')->references('rol_id')->on('roles')->onDelete('cascade');
            $table->foreign('pro_per_id')->references('per_id')->on('permissions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('permissions_roles');
        Schema::dropIfExists('permissions');
    }
}
