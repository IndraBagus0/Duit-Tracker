<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentReminderTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_paymentReminder', function (Blueprint $table) {
            $table->id('notifId');
            $table->date('reminderDate');
            $table->integer('nominal');
            $table->text('description');
            $table->string('status', 10);
            $table->unsignedBigInteger('userId');
            $table->foreign('userId')->references('id')->on('tbl_users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_paymentReminder');
    }
};
