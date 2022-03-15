<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Nullable;

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
            $table->foreignId('customer_id');
            $table->string('order_date',50);
            $table->string('month',50);
            $table->string('year',50);
            $table->string('order_status',50);
            $table->string('delivery_date',50)->nullable();
            $table->string('total_products',50);
            $table->string('sub_total',50);
            $table->string('vat',50);
            $table->string('total',50);
            $table->string('payment_status',50);
            $table->string('pay',50)->nullable();
            $table->string('due',50)->nullable();
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
