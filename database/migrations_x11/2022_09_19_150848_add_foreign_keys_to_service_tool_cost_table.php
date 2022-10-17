<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceToolCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_tool_cost', function (Blueprint $table) {
            $table->foreign(['service_tool_id'], 'fk_service_tool_cost_service_tool1')->references(['service_tool_id'])->on('service_tool')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_tool_cost', function (Blueprint $table) {
            $table->dropForeign('fk_service_tool_cost_service_tool1');
        });
    }
}
