<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketLocationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_location', function (Blueprint $table) {
            $table->unsignedInteger('ticket_id')->index('fk_ticket_location_ticket1_idx');
            $table->integer('factory_id')->index('idx_factory');
            $table->string('site', 250);
            $table->enum('location', ['L', 'F']);
            $table->unsignedInteger('user_id')->index('idx_user');
            $table->timestamp('date_registration')->useCurrent();

            $table->primary(['ticket_id', 'factory_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_location');
    }
}
