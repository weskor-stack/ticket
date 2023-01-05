<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderPerDiemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_per_diem', function (Blueprint $table) {
            $table->unsignedInteger('order_service_id')->index('fk_order_per_diem_order_service1_idx');
            $table->unsignedInteger('per_diem_id')->index('idx_per_diem');
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
        Schema::dropIfExists('order_per_diem');
    }
}
