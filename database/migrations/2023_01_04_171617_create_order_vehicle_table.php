<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderVehicleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_vehicle', function (Blueprint $table) {
            $table->unsignedInteger('order_service_id')->index('fk_order_vehicle_order_service1_idx');
            $table->unsignedInteger('vehicle_id')->index('idx_vehicle');
            $table->string('key', 10);
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
        Schema::dropIfExists('order_vehicle');
    }
}
