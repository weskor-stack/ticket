<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTaskGeneralToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_task_general_tool', function (Blueprint $table) {
            $table->unsignedInteger('service_task_general_id')->index('fk_service_task_general_tool_service_task_general1_idx');
            $table->unsignedInteger('service_tool_id')->index('fk_service_task_general_tool_service_tool1_idx');
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
        Schema::dropIfExists('service_task_general_tool');
    }
}
