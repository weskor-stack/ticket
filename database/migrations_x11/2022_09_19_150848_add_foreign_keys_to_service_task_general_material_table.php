<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTaskGeneralMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_task_general_material', function (Blueprint $table) {
            $table->foreign(['service_task_general_id'], 'fk_service_task_general_material_service_task_general1')->references(['service_task_general_id'])->on('service_task_general')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['service_material_id'], 'fk_service_task_general_material_service_material1')->references(['service_material_id'])->on('service_material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_task_general_material', function (Blueprint $table) {
            $table->dropForeign('fk_service_task_general_material_service_task_general1');
            $table->dropForeign('fk_service_task_general_material_service_material1');
        });
    }
}
