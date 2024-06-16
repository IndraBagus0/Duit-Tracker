<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryTable extends Migration
{
    public function up()
    {
        Schema::create('tbl_category', function (Blueprint $table) {
            $table->id('categoryId');
            $table->string('categoryName', 50);
            $table->string('descriptionCategory', 50);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tbl_category');
    }
};
