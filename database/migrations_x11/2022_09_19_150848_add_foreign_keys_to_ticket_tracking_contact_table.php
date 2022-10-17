<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketTrackingContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_tracking_contact', function (Blueprint $table) {
            $table->foreign(['ticket_tracking_id'], 'fk_ticket_tracking_contact_ticket_tracking1')->references(['ticket_tracking_id'])->on('ticket_tracking')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_tracking_contact', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_tracking_contact_ticket_tracking1');
        });
    }
}
