<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->foreign(['service_status_id'], 'fk_service_service_status1')->references(['service_status_id'])->on('service_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['order_service_id'], 'fk_service_order_service1')->references(['order_service_id'])->on('order_service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service', function (Blueprint $table) {
            $table->dropForeign('fk_service_service_status1');
            $table->dropForeign('fk_service_order_service1');
        });
    }
}
