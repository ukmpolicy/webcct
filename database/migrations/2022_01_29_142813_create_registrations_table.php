<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('attendee_id');
            $table->integer('price');
            $table->string('bp_filename')->nullable(); // Bukti Pembayaran
            $table->string('bs_filename')->nullable(); // Bukti Share
            $table->string('token')->nullable();
            $table->integer('status')->default(0); // 0: checking, 1: deaccept 2: accepted, 3: rechecked
            $table->timestamps();
            
            $table->foreign('attendee_id')->references('id')->on('attendees')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('event_registrations');
    }
}
