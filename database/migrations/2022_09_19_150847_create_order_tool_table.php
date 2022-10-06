<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tool', function (Blueprint $table) {
            $table->increments('order_tool_id');
            $table->double('quantity')->unsigned();
            $table->unsignedInteger('order_service_id')->index('fk_order_tool_order_service1_idx');
            $table->unsignedInteger('tool_id')->index('fk_order_tool_tool1_idx');
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
        Schema::dropIfExists('order_tool');
    }
}
