<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDoctorsTable extends Migration {

	public function up()
	{
		Schema::create('doctors', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->string('email');
			$table->string('phone');
			$table->string('password');
			$table->string('cv')->nullable();
			$table->integer('field_id')->nullable()->unsigned();
			$table->string('lang')->nullable();
			$table->text('specialties')->nullable();
			$table->string('main_focus')->nullable();
			$table->text('experiences')->nullable();
			$table->text('certificates')->nullable();
			$table->tinyInteger('is_admin')->default(0);
			$table->tinyInteger('is_complete')->default(0);
			$table->tinyInteger('gender')->nullable()->default('0');
			$table->tinyInteger('status')->nullable()->default('0');
		});
	}

	public function down()
	{
		Schema::drop('doctors');
	}
}
