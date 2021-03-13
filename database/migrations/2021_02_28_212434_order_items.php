<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderID')->constrained('orders');
            $table->foreignId('productID')->constrained('products');
            $table->foreignId('qualityID')->constrained('quality');
            $table->foreignId('colorID')->constrained('colors');
            $table->integer('quantity');
            $table->double('buying_price');
            $table->double('sale_price');
            $table->string('note');
            $table->integer('number_in_storage');
            $table->string('image')->nullable();
            $table->boolean('available');
            $table->boolean('active')->default(1);
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
        //
    }
}
