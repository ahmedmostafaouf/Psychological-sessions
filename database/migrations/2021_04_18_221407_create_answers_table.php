<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAnswersTable extends Migration {

	public function up()
	{
		Schema::create('answers', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->text('text');
			$table->integer('ask_id')->unsigned();
			$table->integer('doctor_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade')
                ->onUpdate('cascade');

		});
	}

	public function down()
	{
		Schema::drop('answers');
	}
}
