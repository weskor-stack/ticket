<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLineTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('line', function (Blueprint $table) {
            $table->increments('line_id');
            $table->string('name', 35);
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
        Schema::dropIfExists('line');
    }
}
