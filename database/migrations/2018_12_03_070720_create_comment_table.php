<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->nullable();
            $table->string('comment')->nullable();
            $table->longText('file_comment')->nullable();
            $table->timestamp('read_date')->nullable();
            $table->integer('status_id')->unsigned();
            $table->string('staff_id')->nullable();
            $table->string('research_id')->nullable();
            $table->foreign('status_id')->references('status_id')->on('status');
            $table->foreign('staff_id')->references('staff_id')->on('staffs');
            $table->foreign('research_id')->references('research_id')->on('research');
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
        Schema::dropIfExists('comments');
    }
}
