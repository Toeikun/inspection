<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResearchTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('research', function (Blueprint $table) {
            $table->char('research_id', 10)->primary();
            $table->char('research_code', 10)->nullable();
            $table->string('th_topic')->nullable();
            $table->string('eng_topic')->nullable();
            $table->double('wage_abs')->nullable();
            $table->double('wage_ref')->nullable();
            $table->integer('limit')->nullable()->unsigned();
            $table->integer('status_id')->unsigned();
            $table->string('student_id')->nullable();
            $table->integer('ab_status_id')->nullable();
            $table->integer('re_status_id')->nullable();
            $table->string('ab_staff_id')->nullable();
            $table->string('re_staff_id')->nullable();
            $table->string('advisor_id')->nullable();
            $table->string('co_advisor_id')->nullable();
            $table->foreign('status_id')->references('status_id')->on('status');
            $table->foreign('student_id')->references('student_id')->on('students');
            $table->foreign('advisor_id')->references('advisor_id')->on('advisors');
            $table->foreign('co_advisor_id')->references('advisor_id')->on('advisors');
            $table->foreign('ab_staff_id')->references('staff_id')->on('staffs');
            $table->foreign('re_staff_id')->references('staff_id')->on('staffs');
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
        Schema::dropIfExists('Research');
    }
}
