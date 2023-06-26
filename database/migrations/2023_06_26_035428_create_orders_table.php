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
        if (!Schema::hasTable('orders')) {
            Schema::create('orders', function (Blueprint $table) {
                $table->integer('id')->autoIncrement();
                $table->integer('user_id');
                $table->integer('campaign_id');
                $table->integer('package_id');
                $table->string('name');
                $table->string('address');
                $table->string('phone_number');
                $table->integer('quantity');
                $table->decimal('price', 10, 2);
                $table->decimal('total', 10, 2);
                $table->string('payment_method');
                $table->timestamps();

                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('campaign_id')->references('id')->on('campaigns');
                $table->foreign('package_id')->references('id')->on('packages');
            });
        }
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
