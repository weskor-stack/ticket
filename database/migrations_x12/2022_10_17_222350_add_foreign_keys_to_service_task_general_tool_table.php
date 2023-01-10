<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTaskGeneralToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_task_general_tool', function (Blueprint $table) {
            $table->foreign(['service_task_general_id'], 'fk_service_task_general_tool_service_task_general1')->references(['service_task_general_id'])->on('service_task_general')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['service_tool_id'], 'fk_service_task_general_tool_service_tool1')->references(['service_tool_id'])->on('service_tool')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_task_general_tool', function (Blueprint $table) {
            $table->dropForeign('fk_service_task_general_tool_service_task_general1');
            $table->dropForeign('fk_service_task_general_tool_service_tool1');
        });
    }
}
