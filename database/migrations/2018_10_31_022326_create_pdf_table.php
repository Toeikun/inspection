<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePdfTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pdf', function (Blueprint $table) {
            $table->increments('id');
            $table->char('number', 16)->nullable();
            $table->char('research_id', 10)->nullable();
            $table->string('filename')->nullable();
            $table->string('filetype')->nullable();
            $table->timestamp('sent_date')->nullable();
            $table->integer('status_id')->unsigned();
            $table->string('staff_id')->nullable();
            $table->foreign('research_id')->references('research_id')->on('research');
            $table->foreign('staff_id')->references('staff_id')->on('staffs');
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
        Schema::dropIfExists('pdf');
    }
}
