<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfflineordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offlineorders', function (Blueprint $table) {
            $table->id();
            $table->string("customer_name");
            $table->string("address")->nullable();
            $table->bigInteger("phone_no")->nullable();
            $table->integer("product_id")->nullable();
            $table->double("price")->nullable();
            $table->integer("quantity")->nullable();
            $table->string("order_id")->nullable();
            $table->double("total_price")->nullable();
            $table->string("payment_type")->nullable();
            $table->string("payment_status")->nullable();
            $table->string("order_status")->nullable();
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
        Schema::dropIfExists('offlineorders');
    }
}
