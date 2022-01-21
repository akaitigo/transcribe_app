<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResultWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('result_word', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('result_id')->comment('文字起こし内容のid');
            $table->foreign('result_id')->references('id')->on('results');
            $table->unsignedBigInteger('word_id')->comment('単語リストの単語ごとのid');
            $table->foreign('word_id')->references('id')->on('words');
            $table->integer('count')->comment('単語の出てきた回数');
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
        Schema::dropIfExists('result_word');
    }
}
