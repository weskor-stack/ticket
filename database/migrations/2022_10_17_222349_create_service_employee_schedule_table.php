<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceEmployeeScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_employee_schedule', function (Blueprint $table) {
            $table->unsignedInteger('service_employee_id')->index('fk_service_employee_schedule_service_employee1_idx');
            $table->time('time_entry')->comment('Time of entry.');
            $table->time('time_departure')->comment('Time of completion.');
            $table->unsignedInteger('lunchtime');
            $table->double('hours_service')->unsigned()->comment('Hours of service.');
            $table->double('hours_extras')->unsigned()->comment('Overtime service.');
            $table->double('hours_travel')->unsigned()->comment('Duration of travel.');
            $table->date('date');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
            $table->timestamp('date_registration')->useCurrent()->comment('Date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_employee_schedule');
    }
}
