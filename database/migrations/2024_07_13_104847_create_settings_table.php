<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->string('id')->default('1');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('slider_image')->nullable();
            $table->string('background_color')->nullable();
            $table->string('logo')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('footer_description')->nullable();
            $table->string('address')->nullable();
            $table->json('social')->nullable();
            $table->string('fav_icon')->nullable();
            $table->string('right_reserve')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('settings');
    }
}
