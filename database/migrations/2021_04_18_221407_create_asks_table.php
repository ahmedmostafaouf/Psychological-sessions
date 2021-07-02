<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAsksTable extends Migration {

	public function up()
	{
		Schema::create('asks', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('text');
            $table->tinyInteger('status')->default(0);
            $table->integer('patient_id')->unsigned();
			$table->integer('field_id')->unsigned();
		});
	}

	public function down()
	{
		Schema::drop('asks');
	}
}
