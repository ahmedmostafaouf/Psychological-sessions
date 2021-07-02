<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFieldsTable extends Migration {

	public function up()
	{
		Schema::create('fields', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name');
			$table->text('description');
			$table->text('short_description');
		});
	}

	public function down()
	{
		Schema::drop('fields');
	}
}