<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{

    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('usr_id');
            $table->string('usr_email')->unique();
            $table->string('usr_name');
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean('usr_cliente')->default(false);
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        Schema::table('users', function (Blueprint $table) {
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
