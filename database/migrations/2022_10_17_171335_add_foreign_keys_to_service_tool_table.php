<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_tool', function (Blueprint $table) {
            $table->foreign(['tool_id'], 'fk_service_tool_tool1')->references(['tool_id'])->on('tool')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['service_id'], 'fk_service_tool_service1')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_tool', function (Blueprint $table) {
            $table->dropForeign('fk_service_tool_tool1');
            $table->dropForeign('fk_service_tool_service1');
        });
    }
}
