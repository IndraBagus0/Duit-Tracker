<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_role', function (Blueprint $table) {
            $table->id('id');
            $table->string('roleName', 10);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_role');
    }
};


