<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToServiceContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('service_contact', function (Blueprint $table) {
            $table->foreign(['status_id'], 'fk_service_contact_status1')->references(['status_id'])->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['service_id'], 'fk_service_contact_service1')->references(['service_id'])->on('service')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('service_contact', function (Blueprint $table) {
            $table->dropForeign('fk_service_contact_status1');
            $table->dropForeign('fk_service_contact_service1');
        });
    }
}
