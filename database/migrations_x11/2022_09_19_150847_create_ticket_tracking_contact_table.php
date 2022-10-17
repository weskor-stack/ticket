<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketTrackingContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_tracking_contact', function (Blueprint $table) {
            $table->unsignedInteger('ticket_tracking_id')->index('fk_ticket_tracking_contact_ticket_tracking1_idx');
            $table->unsignedInteger('contact_id')->index('idx_contact');
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_tracking_contact');
    }
}
