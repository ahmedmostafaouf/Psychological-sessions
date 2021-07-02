<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoctorSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('doctor_schedules', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->integer('doctor_id')->unsigned();
            $table->string('start_time');
            $table->string('end_time');
            $table->integer('average_consulting_time');
            $table->tinyInteger('status')->nullable()->default('0');
            $table->enum('day',['Sunday','Monday','Tuesday','Wednesday','Thursday','Friday','Saturday']);
            $table->foreign('doctor_id')->references('id')->on('doctors')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('doctor_schedules');
    }
}
