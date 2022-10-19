<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderToolCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tool_cost', function (Blueprint $table) {
            $table->unsignedInteger('order_tool_id')->index('fk_order_tool_cost_order_tool1_idx');
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
        Schema::dropIfExists('order_tool_cost');
    }
}
