<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_contact', function (Blueprint $table) {
            $table->foreign(['status_id'], 'fk_ticket_contact_status1')->references(['status_id'])->on('status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ticket_id'], 'fk_ticket_contact_ticket1')->references(['ticket_id'])->on('ticket')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_contact', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_contact_status1');
            $table->dropForeign('fk_ticket_contact_ticket1');
        });
    }
}
