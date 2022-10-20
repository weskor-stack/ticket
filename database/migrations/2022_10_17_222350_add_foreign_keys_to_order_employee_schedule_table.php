<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderEmployeeScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_employee_schedule', function (Blueprint $table) {
            $table->foreign(['order_service_id'], 'fk_order_employee_schedule_order_employee1')->references(['order_service_id'])->on('order_employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_employee_schedule', function (Blueprint $table) {
            $table->dropForeign('fk_order_employee_schedule_order_employee1');
        });
    }
}
