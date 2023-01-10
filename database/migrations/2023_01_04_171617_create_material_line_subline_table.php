<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaterialLineSublineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_line_subline', function (Blueprint $table) {
            $table->unsignedInteger('material_material_id')->index('fk_material_line_subline_material1_idx');
            $table->unsignedInteger('line_line_id')->index('fk_material_line_subline_line1_idx');
            $table->unsignedInteger('subline_subline_id')->index('fk_material_line_subline_subline1_idx');
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('material_line_subline');
    }
}
