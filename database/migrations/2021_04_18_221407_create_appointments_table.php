<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppointmentsTable extends Migration {

	public function up()
	{
		Schema::create('appointments', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('id_payment');
			$table->datetime('start_date');
			$table->datetime('end_date');
			$table->integer('doctor_id')->unsigned();
			$table->integer('patient_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('appointments');
	}
}
