<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMonthlyLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('monthly_logs', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id', false, true)->nullable();
            $table->date('date')->nullable();
            $table->float('overtime_hours')->unsigned()->nullable();
            $table->integer('days_off', false, true)->nullable();
            $table->integer('total_base_salary', false, true)->nullable();
            $table->integer('over_salary', false, true)->nullable();
            $table->integer('reward', false, true)->nullable();
            $table->integer('total_salary', false, true)->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('monthly_logs');
    }
}
