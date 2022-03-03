<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalkshowCheckinTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talkshow_checkin', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id');
            $table->integer('count');
            $table->timestamps();

            $table->foreign('attendee_id')->references('id')->on('talkshow_registrations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talkshow_checkin');
    }
}
