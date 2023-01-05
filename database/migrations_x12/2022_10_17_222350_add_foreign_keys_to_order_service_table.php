<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_service', function (Blueprint $table) {
            $table->foreign(['order_status_id'], 'fk_order_service_order_status1')->references(['order_status_id'])->on('order_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['type_service_id'], 'fk_order_service_type_service1')->references(['type_service_id'])->on('type_service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['type_maintenance_id'], 'fk_order_service_type_maintenance1')->references(['type_maintenance_id'])->on('type_maintenance')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ticket_id'], 'fk_service_order_ticket1')->references(['ticket_id'])->on('ticket')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_service', function (Blueprint $table) {
            $table->dropForeign('fk_order_service_order_status1');
            $table->dropForeign('fk_order_service_type_service1');
            $table->dropForeign('fk_order_service_type_maintenance1');
            $table->dropForeign('fk_service_order_ticket1');
        });
    }
}
