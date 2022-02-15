<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCRAttachmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cr_attachments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cr_id');
            $table->string('key');
            $table->string('filename');

            $table->foreign('cr_id')->references('id')->on('competition_registrations');
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
        Schema::dropIfExists('cr_attachments');
    }
}
