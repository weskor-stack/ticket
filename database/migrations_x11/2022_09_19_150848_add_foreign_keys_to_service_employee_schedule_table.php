<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceEmployeeScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_employee_schedule', function (Blueprint $table) {
            $table->foreign(['service_employee_id'], 'fk_service_employee_schedule_service_employee1')->references(['service_employee_id'])->on('service_employee')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_employee_schedule', function (Blueprint $table) {
            $table->dropForeign('fk_service_employee_schedule_service_employee1');
        });
    }
}
