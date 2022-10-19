<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTaskGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_task_general', function (Blueprint $table) {
            $table->increments('service_task_general_id');
            $table->unsignedInteger('service_id')->index('fk_service_task_general_service_task1_idx');
            $table->unsignedInteger('task_general_id')->index('idx_task_general');
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
        Schema::dropIfExists('service_task_general');
    }
}
