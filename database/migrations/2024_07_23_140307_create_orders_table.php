<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('invocie_id');
            $table->integer('user_id');
            $table->double('sub_total');
            $table->double('amount');
            $table->string('currency_name');
            $table->string('currency_icon');
            $table->integer('product_qty');
            $table->string('payment_method');
            $table->integer('payment_status');
            $table->text('order_address');
            $table->text('shpping_method');
            $table->text('coupon');
            $table->string('order_status');
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
        Schema::dropIfExists('orders');
    }
}
