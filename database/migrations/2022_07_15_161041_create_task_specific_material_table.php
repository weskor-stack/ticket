<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaskSpecificMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task_specific_material', function (Blueprint $table) {
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('task_specific_id');
            $table->unsignedInteger('material_used_id')->index('fk_task_specific_material_material_used1_idx');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->index(['service_id', 'task_specific_id'], 'fk_task_specific_material_task_specific_report1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task_specific_material');
    }
}
