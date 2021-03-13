<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class OrderDepts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_depts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('orderID')->constrained('orders');
            $table->foreignId('customer_depts_ID')->constrained('customer_depts_returns');
            $table->double('payed');
            $table->Timestamp('payed_date')->nullable();
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
