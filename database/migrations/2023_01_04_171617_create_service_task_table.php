<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceTaskTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_task', function (Blueprint $table) {
            $table->unsignedInteger('service_id')->primary();
            $table->string('description', 250)->comment('Description of the activity');
            $table->longText('previous_evidence')->comment('Previous evidence.');
            $table->longText('subsequent_evidence')->comment('Subsequent evidence.');
            $table->text('signature_evidence')->comment('signature of conformity');
            $table->unsignedInteger('contact_id')->index('idx_contact');
            $table->unsignedInteger('employee_id')->index('idx_employee');
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
        Schema::dropIfExists('service_task');
    }
}
