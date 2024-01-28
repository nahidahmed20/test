<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer('customer_id');
            $table->integer('courier_id')->default('0');
            $table->float('order_total',10,2);
            $table->float('tax_total',10,2);
            $table->float('shipping_total',10,2);
            $table->text('order_date');
            $table->text('order_timestamp');
            $table->string('order_status')->default('pending');
            $table->text('delivery_address');
            $table->string('delivery_status')->default('pending');
            $table->string('payment_method');
            $table->string('payment_status')->default('pending');
            $table->integer('payment_amount')->default(0);
            $table->text('payment_date')->nullable();
            $table->text('payment_timestamp')->nullable();
            $table->text('currency')->default('BDT');
            $table->text('transaction_id')->nullable();
            $table->timestamps();

            $table->integer('customer_id');
            $table->integer('courier_id')->default(0);
            $table->float('order_total',10,2);
            $table->float('tax_total',10,2);
            $table->float('shipping_total',10, 2);
            $table->text('order_date');
            $table->text('order_timestamp');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
