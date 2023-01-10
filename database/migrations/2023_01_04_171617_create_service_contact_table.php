<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_contact', function (Blueprint $table) {
            $table->unsignedInteger('service_id')->index('fk_service_contact_service1_idx');
            $table->unsignedInteger('contact_id');
            $table->unsignedInteger('status_id')->index('fk_service_contact_status1_idx');
            $table->unsignedInteger('user_id');
            $table->timestamp('date_registration')->useCurrent();

            $table->primary(['service_id', 'contact_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('service_contact');
    }
}
