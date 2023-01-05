<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderToolCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_tool_cost', function (Blueprint $table) {
            $table->foreign(['order_tool_id'], 'fk_order_tool_cost_order_tool1')->references(['order_tool_id'])->on('order_tool')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_tool_cost', function (Blueprint $table) {
            $table->dropForeign('fk_order_tool_cost_order_tool1');
        });
    }
}
