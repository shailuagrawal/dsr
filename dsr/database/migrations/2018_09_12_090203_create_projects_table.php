<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->increments('id');
            $table->string('project_name');
            $table->string('mail_to')->nullable();
            $table->string('mail_cc')->nullable();;
            $table->text('message')->nullable();;
            $table->date('dead_line')->nullable();;
            $table->date('expected_start')->nullable();;
            $table->date('complete_on')->nullable();;
            $table->boolean('active')->default(1);
            $table->text('remark')->nullable();
            $table->integer('manager_id')->unsigned()->nullable();
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
        Schema::dropIfExists('projects');
    }
}
