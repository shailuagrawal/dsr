<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSystemrequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('systemrequests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('pc_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->string('location')->nullable();
            $table->string('request_area')->nullable();
            $table->text('detail')->nullable();
            $table->string('verbally_notified_to')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->text('comment')->nullable();
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
        Schema::dropIfExists('systemrequests');
    }
}
