<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 50);
            $table->string('email', 30)->unique();
            $table->string('password', 255);
            $table->string('phoneNumber', 15);
            $table->string('accountBalance', 15);
            $table->unsignedBigInteger('roleId');
            $table->foreign('roleId')->references('id')->on('tbl_role');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_users');
    }
};
