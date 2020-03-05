<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->increments('id');//รหัสหนังสือ
            $table->string('title');//ชื่อหนังสือ
            $table->decimal('price',10,2);//ราคา
            $table->integer('typebooks_id')->unsigned();
            $table->foreign('typebooks_id')->references('id')->on('typebooks');
            $table->string('image');//เก็บภาพหนังสือ
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('books');
    }
}
