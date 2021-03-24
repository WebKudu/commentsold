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
            $table->foreignId('product_id')->constrained();
            $table->foreignId('inventory_id')->constrained();
            $table->string('street_address');
            $table->string('apartment');
            $table->string('city');
            $table->string('state');
            $table->string('country_code');
            $table->string('zip');
            $table->string('phone_number');
            $table->string('email');
            $table->string('name');
            $table->string('order_status');
            $table->string('payment_ref');
            $table->string('transaction_id');
            $table->integer('payment_amt_cents');
            $table->integer('ship_charged_cents')->nullable();
            $table->integer('ship_cost_cents')->nullable();
            $table->integer('subtotal_cents');
            $table->integer('total_cents');
            $table->string('shipper_name');
            $table->timestamp('payment_date');
            $table->timestamp('shipped_date');
            $table->string('tracking_number');
            $table->integer('tax_total_cents')->unsigned();
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
