<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staffs', function (Blueprint $table) {
            $table->string('staff_id')->primary();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->char('contact', 10)->nullable();
            $table->string('regis_pass')->nullable();
            $table->string('password')->nullable();
            $table->string('created_by')->nullable();
            $table->integer('status_id')->unsigned();
            $table->foreign('status_id')->references('status_id')->on('status');
            $table->integer('position_id')->unsigned();
            $table->foreign('position_id')->references('position_id')->on('position');
            $table->integer('department_id')->unsigned();
            $table->foreign('department_id')->references('department_id')->on('departments');
            $table->integer('permission_id')->unsigned();
            $table->foreign('permission_id')->references('permission_id')->on('permission');
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty');
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
        Schema::dropIfExists('staffs');
    }
}
