<?php

// Migration untuk tabel Orders
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');
            $table->unsignedBigInteger('id_cart');
            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_product');
            $table->string('status');
            $table->dateTime('datetime');
            $table->timestamps();

            $table->foreign('id_cart')->references('id_cart')->on('carts')->onDelete('cascade');
            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
            $table->foreign('id_product')->references('id_product')->on('products')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
