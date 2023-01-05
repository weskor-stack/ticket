<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToOrderMaterialCostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('order_material_cost', function (Blueprint $table) {
            $table->foreign(['order_material_id'], 'fk_order_material_cost_order_material1')->references(['order_material_id'])->on('order_material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('order_material_cost', function (Blueprint $table) {
            $table->dropForeign('fk_order_material_cost_order_material1');
        });
    }
}
