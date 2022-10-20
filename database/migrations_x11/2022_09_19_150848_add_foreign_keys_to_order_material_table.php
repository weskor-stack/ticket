<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->foreign(['order_service_id'], 'fk_order_material_order_service1')->references(['order_service_id'])->on('order_service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_id'], 'fk_order_material_material1')->references(['material_id'])->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_material', function (Blueprint $table) {
            $table->dropForeign('fk_order_material_order_service1');
            $table->dropForeign('fk_order_material_material1');
        });
    }
}
