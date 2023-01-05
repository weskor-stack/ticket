<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_employee', function (Blueprint $table) {
            $table->increments('service_employee_id');
            $table->unsignedInteger('service_id')->index('fk_service_employee_service1_idx');
            $table->unsignedInteger('employee_id')->index('idx_employee');
            $table->unsignedInteger('status_id')->index('fk_service_employee_status1_idx');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_employee');
    }
}
