<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('from_mail');
            $table->string('room_email');
            $table->datetime('start_time');
            $table->datetime('end_time');
            $table->timestamps();
            $table->foreign('from_mail')->references('email')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('room_email')->references('room_email')->on('rooms')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
