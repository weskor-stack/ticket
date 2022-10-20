<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceMaterialTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_material', function (Blueprint $table) {
            $table->increments('service_material_id');
            $table->double('quantity')->comment('Material assigned for the service order.');
            $table->unsignedInteger('service_id')->index('fk_service_material_service1_idx');
            $table->unsignedInteger('material_id')->index('fk_service_material_material1_idx');
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
        Schema::dropIfExists('service_material');
    }
}
