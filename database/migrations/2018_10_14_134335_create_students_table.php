<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->string('student_id')->primary();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->char('semester', 1)->nullable();
            $table->char('years', 4)->nullable();
            $table->char('contact', 10)->nullable();
            $table->string('created_by')->nullable();
            $table->string('regis_pass')->nullable();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('status');
            $table->integer('degree_id')->unsigned();
            $table->foreign('degree_id')->references('degree_id')->on('degree');
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty');
            $table->integer('major_id')->unsigned();
            $table->foreign('major_id')->references('major_id')->on('major');
            $table->string('password');
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
        Schema::dropIfExists('students');
    }
}
