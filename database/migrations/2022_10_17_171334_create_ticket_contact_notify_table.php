<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketContactNotifyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_contact_notify', function (Blueprint $table) {
            $table->unsignedInteger('ticket_id');
            $table->unsignedInteger('contact_id');
            $table->unsignedInteger('status_ticket_id')->index('fk_ticket_contact_notify_ticket_status1_idx');
            $table->unsignedInteger('email_status_id')->index('fk_ticket_contact_notify_email_status1_idx');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->index(['ticket_id', 'contact_id'], 'fk_ticket_contact_notify_ticket_contact1_idx');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_contact_notify');
    }
}
