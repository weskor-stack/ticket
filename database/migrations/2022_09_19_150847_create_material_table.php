<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material', function (Blueprint $table) {
            $table->increments('material_id')->comment('Registration identifier.');
            $table->char('key', 20)->comment('Key in inventory.');
            $table->string('name', 150)->comment('Material description.');
            $table->double('stock')->comment('Quantity in inventory.');
            $table->unsignedInteger('material_classifier_id')->index('fk_material_material_classifier1_idx');
            $table->unsignedInteger('unit_measure_id')->index('fk_material_unit_measure1_idx');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
            $table->timestamp('date_registration')->useCurrent()->comment('Date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('material');
    }
}
