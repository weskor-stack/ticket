<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_contact', function (Blueprint $table) {
            $table->unsignedInteger('ticket_id')->index('fk_ticket_contact_ticket1_idx');
            $table->unsignedInteger('contact_id')->index('idx_contact');
            $table->unsignedInteger('status_id')->index('fk_ticket_contact_status1_idx');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->primary(['ticket_id', 'contact_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_contact');
    }
}
