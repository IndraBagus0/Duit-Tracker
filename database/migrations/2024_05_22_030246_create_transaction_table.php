<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_transaction', function (Blueprint $table) {
            $table->id('transactionId');
            $table->date('transactionDate');
            $table->bigInteger('transactionAmount');
            $table->text('notesTransaction')->nullable();
            $table->string('transactionType', 20);
            $table->unsignedBigInteger('categoryId');
            $table->unsignedBigInteger('userId');
            $table->foreign('categoryId')->references('categoryId')->on('tbl_category');
            $table->foreign('userId')->references('id')->on('tbl_users');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_transaction');
    }
}
