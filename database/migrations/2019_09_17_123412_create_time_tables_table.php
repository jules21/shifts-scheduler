<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTimeTablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('time_tables', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('day1')->default(0);
            $table->string('day2')->default(0);
            $table->string('day3')->default(0);
            $table->string('day4')->default(0);
            $table->string('day5')->default(0);
            $table->string('day6')->default(0);
            $table->string('day7')->default(0);
            $table->tinyInteger('employee_id')->default(0);
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
        Schema::dropIfExists('time_tables');
    }
}
