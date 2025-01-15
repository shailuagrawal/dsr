<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLeavesAdvanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leaves_advance', function (Blueprint $table) {
            $table->increments('id');
            $table->string('subject')->nullable();
            $table->integer('emp_id')->unsigned();
            $table->integer('month')->default(0);
            $table->integer('leaves')->default(0);
            $table->integer('advance')->default(0);
            $table->integer('half_day')->default(0);
            $table->string('half_day_dates')->nullable();
            $table->string('late_mark')->default(0);
            $table->string('overtime')->nullable();
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
        Schema::dropIfExists('leaves_advance');
    }
}
