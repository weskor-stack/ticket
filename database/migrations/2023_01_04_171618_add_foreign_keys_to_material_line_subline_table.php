<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToMaterialLineSublineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('material_line_subline', function (Blueprint $table) {
            $table->foreign(['subline_subline_id'], 'fk_material_line_subline_subline1')->references(['subline_id'])->on('subline')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['material_material_id'], 'fk_material_line_subline_material1')->references(['material_id'])->on('material')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['line_line_id'], 'fk_material_line_subline_line1')->references(['line_id'])->on('line')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('material_line_subline', function (Blueprint $table) {
            $table->dropForeign('fk_material_line_subline_subline1');
            $table->dropForeign('fk_material_line_subline_material1');
            $table->dropForeign('fk_material_line_subline_line1');
        });
    }
}
