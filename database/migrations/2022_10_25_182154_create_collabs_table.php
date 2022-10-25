<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('collabs', function (Blueprint $table) {
            $table->id();
            $table->string('real_name');
            $table->integer('user_id');
            $table->string('channel_name');
            $table->string('channel_link');
            $table->string('tiktok_link');
            $table->string('subscriber');
            $table->string('whatsapp_number');
            $table->string('pubg_id');
            $table->string('email');
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
        Schema::dropIfExists('collabs');
    }
};
