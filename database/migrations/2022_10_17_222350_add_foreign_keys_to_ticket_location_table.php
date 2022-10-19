<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_location', function (Blueprint $table) {
            $table->foreign(['ticket_id'], 'fk_ticket_location_ticket1')->references(['ticket_id'])->on('ticket')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_location', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_location_ticket1');
        });
    }
}
