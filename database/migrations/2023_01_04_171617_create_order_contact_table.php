<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_contact', function (Blueprint $table) {
            $table->unsignedInteger('order_service_id')->index('fk_order_contact_order_service1_idx');
            $table->unsignedInteger('customer_id')->index('idx_customer');
            $table->unsignedInteger('status_id')->index('fk_order_contact_status1_idx');
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
        Schema::dropIfExists('order_contact');
    }
}
