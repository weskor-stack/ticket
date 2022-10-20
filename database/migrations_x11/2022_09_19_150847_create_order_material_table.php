<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_material', function (Blueprint $table) {
            $table->increments('order_material_id');
            $table->double('quantity')->unsigned()->comment('Material assigned for the service order.');
            $table->unsignedInteger('order_service_id')->index('fk_order_material_order_service1_idx');
            $table->unsignedInteger('material_id')->index('fk_order_material_material1_idx');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
            $table->timestamp('date_registration')->useCurrent()->comment('Date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_material');
    }
}
