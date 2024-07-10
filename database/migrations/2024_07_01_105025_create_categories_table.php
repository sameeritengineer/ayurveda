<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string("cat_name")->nullable()->unique();
            $table->string("cat_slug")->nullable()->unique();
            $table->integer('parent_id', false, true)->nullable()->length(10);
            $table->longText("description");
            $table->string('image')->nullable();
            $table->integer('status', false, true)->default(1)->nullable()->length(5);
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
        Schema::dropIfExists('categories');
    }
}
