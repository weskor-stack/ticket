<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceTaskGeneralTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_task_general', function (Blueprint $table) {
            $table->foreign(['service_id'], 'fk_service_task_general_service_task1')->references(['service_id'])->on('service_task')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_task_general', function (Blueprint $table) {
            $table->dropForeign('fk_service_task_general_service_task1');
        });
    }
}
