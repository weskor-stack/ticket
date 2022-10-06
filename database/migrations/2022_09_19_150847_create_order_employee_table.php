<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_employee', function (Blueprint $table) {
            $table->unsignedInteger('order_service_id')->index('fk_order_employee_order_service1_idx');
            $table->unsignedInteger('employee_id')->index('idx_employee');
            $table->unsignedInteger('status_id')->index('fk_order_employee_status1_idx');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->primary(['order_service_id', 'employee_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_employee');
    }
}
