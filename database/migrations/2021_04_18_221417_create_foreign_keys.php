<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Eloquent\Model;

class CreateForeignKeys extends Migration {

	public function up()
	{
		Schema::table('doctors', function(Blueprint $table) {
			$table->foreign('field_id')->references('id')->on('fields')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('appointments', function(Blueprint $table) {
			$table->foreign('doctor_id')->references('id')->on('doctors')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('appointments', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('asks', function(Blueprint $table) {
			$table->foreign('patient_id')->references('id')->on('patients')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('asks', function(Blueprint $table) {
			$table->foreign('field_id')->references('id')->on('fields')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->foreign('ask_id')->references('id')->on('asks')
						->onDelete('cascade')
						->onUpdate('cascade');
		});
	}

	public function down()
	{
		Schema::table('doctors', function(Blueprint $table) {
			$table->dropForeign('doctors_field_id_foreign');
		});
		Schema::table('appointments', function(Blueprint $table) {
			$table->dropForeign('appointments_doctor_id_foreign');
		});
		Schema::table('appointments', function(Blueprint $table) {
			$table->dropForeign('appointments_patient_id_foreign');
		});
		Schema::table('asks', function(Blueprint $table) {
			$table->dropForeign('asks_patient_id_foreign');
		});
		Schema::table('asks', function(Blueprint $table) {
			$table->dropForeign('asks_field_id_foreign');
		});
		Schema::table('answers', function(Blueprint $table) {
			$table->dropForeign('answers_ask_id_foreign');
		});
	}
}