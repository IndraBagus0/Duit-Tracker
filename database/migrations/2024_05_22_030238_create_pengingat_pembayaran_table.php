<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengingatPembayaranTable extends Migration
{
    public function up()
    {
        Schema::create('pengingat_pembayaran', function (Blueprint $table) {
            $table->id('id_notif');
            $table->date('tanggal_pengingat');
            $table->integer('nominal');
            $table->text('deskripsi');
            $table->string('status', 10);
            $table->unsignedBigInteger('id_user');
            $table->foreign('id_user')->references('id')->on('users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pengingat_pembayaran');
    }
};
