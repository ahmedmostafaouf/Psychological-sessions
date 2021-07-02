<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMettingsTable extends Migration
{

    public function up()
    {
        Schema::create('mettings', function (Blueprint $table) {
            $table->id();
            $table->string('topic');
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->tinyInteger('status')->nullable()->default(0);
            $table->integer('doctor_id')->unsigned();
            $table->integer('patient_id')->unsigned();
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('patient_id')->references('id')->on('patients')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('mettings');
    }
}
