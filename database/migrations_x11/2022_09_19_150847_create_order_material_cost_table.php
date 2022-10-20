<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderMaterialCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_material_cost', function (Blueprint $table) {
            $table->unsignedInteger('order_material_id')->primary();
            $table->decimal('average', 18)->unsigned();
            $table->decimal('customer', 18)->unsigned();
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('data_registration')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_material_cost');
    }
}
