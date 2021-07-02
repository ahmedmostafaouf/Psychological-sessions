<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePatientsTable extends Migration {

	public function up()
	{
		Schema::create('patients', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email')->unique();
			$table->string('password');
			$table->date('dob');
			$table->string('address')->nullable();
			$table->string('phone');
			$table->tinyInteger('gender')->nullable()->default('0');
			$table->tinyInteger('status')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('patients');
	}
}
