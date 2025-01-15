<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNewColumnsToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('first_name')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('last_name')->nullable();
            $table->date('dob')->nullable();
            $table->string('sex')->nullable();
            $table->string('personal_email')->nullable();
            $table->string('designation')->nullable();
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('landline_number')->nullable();
            $table->string('other_contact')->nullable();
            $table->string('qualification')->nullable();
            $table->date('date_of_joining')->nullable();
            $table->string('computer_skill')->nullable();
            $table->string('other_skill_experience')->nullable();
            $table->string('total_experience')->nullable();
            $table->string('photo')->nullable();
            $table->string('pre_employer')->nullable();
            $table->string('typing_speed')->nullable();
            $table->string('addition_skill_english')->nullable();
            $table->string('addition_skill_html')->nullable();
            $table->string('addition_skill_photoshop')->nullable();
            $table->string('addition_skill_php')->nullable();
            $table->string('addition_skill_typing')->nullable();
            $table->string('addition_skill_webresearch')->nullable();
            $table->integer('emp_id')->nullable();
            $table->string('user_name')->nullable();
            $table->string('working_status')->nullable();
            $table->string('login_info')->nullable();
            $table->text('remark')->nullable();
            $table->date('company_left_on')->nullable();
            //$table->string('leave_allotted')->nullable();
            //$table->string('leave_forwarded')->nullable();
            //$table->string('other_leave')->nullable();
            $table->string('ready_for_night_shift')->nullable();
            $table->string('working_on_shift')->nullable();
            $table->integer('role_id')->nullable();
            $table->integer('project_id')->nullable();
            $table->integer('leaves_forward')->default(0);
            $table->integer('leaves_allotted')->default(0);
            $table->integer('other_leaves_allotted')->default(0);
            $table->date('date_allotted')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
