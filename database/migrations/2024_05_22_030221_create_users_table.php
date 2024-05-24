<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 30)->unique();
            $table->string('password', 255);
            $table->string('no_hp', 15);
            $table->string('saldo', 15);
            $table->unsignedBigInteger('id_role');
            $table->foreign('id_role')->references('id')->on('role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
