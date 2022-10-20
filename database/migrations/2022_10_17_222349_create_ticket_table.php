<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket', function (Blueprint $table) {
            $table->increments('ticket_id')->comment('Registration identifier.');
            $table->string('subject', 250)->comment('Ticket subject');
            $table->text('problem')->comment('Problem to be solved');
            $table->date('date_ticket')->default('CURRENT_TIMESTAMP')->comment('Creation date.');
            $table->unsignedInteger('contact_id');
            $table->unsignedInteger('ticket_priority_id')->index('fk_ticket_ticket_priority1_idx');
            $table->unsignedInteger('ticket_status_id')->index('fk_ticket_ticket_status1_idx');
            $table->unsignedInteger('ticket_origin_id')->index('fk_ticket_ticket_origin1_idx');
            $table->unsignedInteger('user_id')->index('idx_user')->comment('Registration user.');
            $table->timestamp('date_registration')->useCurrent()->comment('Date of registration.');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket');
    }
}
