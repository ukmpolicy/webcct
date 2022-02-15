<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tr_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tr_id');
            $table->string('key');
            $table->string('filename');

            $table->foreign('tr_id')->references('id')->on('talkshow_registrations');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tr_attachmentss');
    }
}
