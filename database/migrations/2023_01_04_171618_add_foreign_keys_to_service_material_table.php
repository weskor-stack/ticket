<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_material', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_service_material_service1')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_id'], 'fk_service_material_material1')->references(['material_id'])->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_material', function (Blueprint $table) {
            $table->dropForeign('fk_service_material_service1');
            $table->dropForeign('fk_service_material_material1');
        });
    }
}
