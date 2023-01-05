<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material', function (Blueprint $table) {
            $table->foreign(['unit_measure_id'], 'fk_material_unit_measure1')->references(['unit_measure_id'])->on('unit_measure')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_id'], 'fk_material_status1')->references(['status_id'])->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_classifier_id'], 'fk_material_material_classifier1')->references(['material_classifier_id'])->on('material_classifier')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material', function (Blueprint $table) {
            $table->dropForeign('fk_material_unit_measure1');
            $table->dropForeign('fk_material_status1');
            $table->dropForeign('fk_material_material_classifier1');
        });
    }
}
