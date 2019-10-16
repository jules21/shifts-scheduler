<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSwapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('swaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->default(2);
            $table->integer('swapper')->default(4);
            $table->date('date');
            $table->date('edate');
            $table->string('status')->default('pending');
            $table->string('right')->default('denial');
            $table->string('slug')->default('1');
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
        Schema::dropIfExists('swaps');
    }
}
