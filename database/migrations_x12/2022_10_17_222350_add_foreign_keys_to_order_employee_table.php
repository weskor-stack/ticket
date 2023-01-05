<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_employee', function (Blueprint $table) {
            $table->foreign(['order_service_id'], 'fk_order_employee_order_service1')->references(['order_service_id'])->on('order_service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_id'], 'fk_order_employee_status1')->references(['status_id'])->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_employee', function (Blueprint $table) {
            $table->dropForeign('fk_order_employee_order_service1');
            $table->dropForeign('fk_order_employee_status1');
        });
    }
}
