<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Constraints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('teams', function (Blueprint $table) {
            $table->foreign('team_lead_id')->references('id')->on('employees')->onDelete('cascade');
            $table->foreign('project_manager_id')->references('id')->on('employees')->onDelete('cascade');
        });
        Schema::table('employees', function (Blueprint $table) {
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });
        Schema::table('vacations', function (Blueprint $table) {
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
        Schema::table('vacation_requests', function (Blueprint $table) {
            $table->foreign('vacation_id')->references('id')->on('vacations')->onDelete('cascade');
            $table->foreign('team_lead_id')->references('id')->on('teams')->onDelete('cascade');
            $table->foreign('project_manager_id')->references('id')->on('teams')->onDelete('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('email')->references('email')->on('employees')->onDelete('cascade');
            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
