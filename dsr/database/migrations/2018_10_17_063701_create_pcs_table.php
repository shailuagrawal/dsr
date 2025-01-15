<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePcsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pcs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('machine_no')->nullable();
            $table->string('machine_name')->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('machine_location')->nullable();
            $table->string('machine_status')->nullable();
            $table->string('processor_info')->nullable();
            $table->string('motherboard_info')->nullable();
            $table->string('ram_total')->nullable();
            $table->string('ram_slot1')->nullable();
            $table->string('ram_slot2')->nullable();
            $table->string('ram_type')->nullable();
            $table->string('harddisk_size')->nullable();
            $table->string('harddisk_partition')->nullable();
            $table->string('monitor_info')->nullable();
            $table->text('comment')->nullable();
            $table->text('description_system_driver')->nullable();
            $table->string('driver_files')->nullable();
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
        Schema::dropIfExists('pcs');
    }
}
