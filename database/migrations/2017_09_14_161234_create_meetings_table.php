<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMeetingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('meetings', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            
            $table->increments('id');
            $table->string('room_email');
            $table->string('meeting_no')->nullable();
            $table->string('subject')->nullable();
            $table->text('description')->nullable();
            $table->integer('sequence')->default(0);
            $table->string('uuid')->nullable();
            $table->string('from');
            $table->string('from_mail');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->integer('count')->nullable();
            $table->integer('month_of_year')->nullable();
            $table->string('day_of_year')->nullable();
            $table->string('day_s_of_week')->nullable();
            $table->integer('day_of_month')->nullable();
            $table->string('frequency')->nullable();
            $table->string('location');
            $table->integer('interval')->nullable();
            $table->boolean('isRecurrent')->default(0);
            $table->boolean('isCancel')->default(0);
            $table->integer('revision')->nullable();
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
        Schema::dropIfExists('meetings');
    }
}
