<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderSummeriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_summeries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('custome_phone_number');
            $table->string('customer_country');
            $table->string('customer_city');
            $table->text('customer_address');
            $table->longText('customer_notes')->nullable();
            $table->float('total_amount');
            $table->float('discount_amount')->default(0);
            $table->float('shipping_charge');
            $table->float('grand_total');
            $table->string('coupon_name')->nullable();
            $table->string('payment_method');
            $table->string('payment_status');
            $table->string('delivary_status')->default('pending');
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
        Schema::dropIfExists('order_summeries');
    }
}
