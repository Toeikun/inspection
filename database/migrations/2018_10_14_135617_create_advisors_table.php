<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advisors', function (Blueprint $table) {
            $table->string('advisor_id')->primary();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->char('contact', 10)->nullable();
            $table->string('regis_pass')->nullable();
            $table->string('password')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('position_id')->on('position');
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('status');
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty');
            $table->integer('major_id')->unsigned();
            $table->foreign('major_id')->references('major_id')->on('major');
            $table->rememberToken();
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
        Schema::dropIfExists('advisors');
    }
}
