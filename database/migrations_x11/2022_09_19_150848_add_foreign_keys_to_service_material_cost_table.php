<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceMaterialCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_material_cost', function (Blueprint $table) {
            $table->foreign(['service_material_id'], 'fk_service_material_cost_service_material1')->references(['service_material_id'])->on('service_material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_material_cost', function (Blueprint $table) {
            $table->dropForeign('fk_service_material_cost_service_material1');
        });
    }
}
