<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTicketContactNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ticket_contact_notify', function (Blueprint $table) {
            $table->foreign(['ticket_id'], 'fk_ticket_contact_notify_ticket1')->references(['ticket_id'])->on('ticket')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['email_status_id'], 'fk_ticket_contact_notify_email_status1')->references(['email_status_id'])->on('email_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['ticket_id', 'contact_id'], 'fk_ticket_contact_notify_ticket_contact1')->references(['ticket_id', 'contact_id'])->on('ticket_contact')->onUpdate('NO ACTION')->onDelete('NO ACTION');
            $table->foreign(['status_ticket_id'], 'fk_ticket_contact_notify_ticket_status1')->references(['ticket_status_id'])->on('ticket_status')->onUpdate('NO ACTION')->onDelete('NO ACTION');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ticket_contact_notify', function (Blueprint $table) {
            $table->dropForeign('fk_ticket_contact_notify_ticket1');
            $table->dropForeign('fk_ticket_contact_notify_email_status1');
            $table->dropForeign('fk_ticket_contact_notify_ticket_contact1');
            $table->dropForeign('fk_ticket_contact_notify_ticket_status1');
        });
    }
}
