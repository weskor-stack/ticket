<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceToolCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tool_cost', function (Blueprint $table) {
            $table->unsignedInteger('service_tool_id')->index('fk_service_tool_cost_service_tool1_idx');
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
        Schema::dropIfExists('service_tool_cost');
    }
}
