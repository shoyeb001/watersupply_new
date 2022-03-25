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
            $table->integer("user_id");
            $table->string("customer_name");
            $table->string("email");
            $table->bigInteger("phone_no");
            $table->integer("pin_no");
            $table->string("city");
            $table->string("country");
            $table->string("state");
            $table->string("full_address");
            $table->string("size");
            $table->integer("quantity");
            $table->integer("price");
            $table->string("message");
            $table->string("payment_type");
            $table->string("payment_status");
            $table->string("order_status");
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
