<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->foreign(['ticket_priority_id'], 'fk_ticket_ticket_priority1')->references(['ticket_priority_id'])->on('ticket_priority')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ticket_origin_id'], 'fk_ticket_ticket_origin1')->references(['ticket_origin_id'])->on('ticket_origin')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ticket_status_id'], 'fk_ticket_ticket_status1')->references(['ticket_status_id'])->on('ticket_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_ticket_priority1');
            $table->dropForeign('fk_ticket_ticket_origin1');
            $table->dropForeign('fk_ticket_ticket_status1');
        });
    }
}
