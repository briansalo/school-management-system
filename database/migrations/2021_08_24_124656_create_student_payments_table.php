<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStudentPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('student_payments', function (Blueprint $table) {
            $table->id();
            $table->integer('student_id')->comment('user_id=student_id');
            $table->integer('fee_category_id')->nullable();
            $table->integer('year_id')->nullable();
            $table->integer('class_id')->nullable();
            $table->double('discount')->nullable();
            $table->double('amount')->nullable();
            $table->tinyInteger('status')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('january')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('February')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('March')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('April')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('May')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('June')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('July')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('August')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('September')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('October')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('November')->default(1)->comment('0=paid, 1=unpaid');
            $table->string('December')->default(1)->comment('0=paid, 1=unpaid');
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
        Schema::dropIfExists('student_payments');
    }
}
