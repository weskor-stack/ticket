<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderScheduleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_schedule', function (Blueprint $table) {
            $table->unsignedInteger('order_service_id')->index('fk_order_schedule_order_service1_idx');
            $table->double('hours_service')->unsigned();
            $table->double('hours_travel')->unsigned();
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
        Schema::dropIfExists('order_schedule');
    }
}
