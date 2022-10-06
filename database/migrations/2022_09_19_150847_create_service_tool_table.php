<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceToolTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tool', function (Blueprint $table) {
            $table->increments('service_tool_id');
            $table->double('quantity');
            $table->unsignedInteger('service_id')->index('fk_service_tool_service1_idx');
            $table->unsignedInteger('tool_id')->index('fk_service_tool_tool1_idx');
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
        Schema::dropIfExists('service_tool');
    }
}
