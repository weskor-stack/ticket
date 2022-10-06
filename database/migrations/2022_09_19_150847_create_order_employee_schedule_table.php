<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderEmployeeScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_employee_schedule', function (Blueprint $table) {
            $table->increments('order_employee_schedule_id');
            $table->time('time_entry');
            $table->time('time_departure');
            $table->time('lunchtime');
            $table->double('hours_service')->unsigned();
            $table->double('hours_travel')->unsigned();
            $table->date('date');
            $table->unsignedInteger('order_service_id');
            $table->unsignedInteger('employee_id');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->index(['order_service_id', 'employee_id'], 'fk_order_employee_schedule_order_employee1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_employee_schedule');
    }
}
