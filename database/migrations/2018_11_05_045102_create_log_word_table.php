<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogWordTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_words', function (Blueprint $table) {
            $table->increments('id');
            $table->char('research_id', 10)->nullable();
            $table->char('number', 16)->nullable();
            $table->string('filename')->nullable();
            $table->string('filetype')->nullable();
            $table->string('messages')->unsigned();
            $table->integer('status_id')->unsigned();
            $table->foreign('research_id')->references('research_id')->on('research');
            $table->foreign('status_id')->references('status_id')->on('status');
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
        Schema::dropIfExists('log_words');
    }
}
