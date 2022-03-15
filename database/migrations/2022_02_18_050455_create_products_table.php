<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id');
            $table->foreignId('supplier_id');
            $table->string('product_name',80);
            $table->string('product_code',50);
            $table->string('product_garage',50);
            $table->string('product_route',50);
            $table->string('product_image',50);
            $table->string('buy_date',50);
            $table->string('expire_date',50);
            $table->string('buying_price',50);
            $table->string('selling_price',50);
            $table->softDeletes();
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
        Schema::dropIfExists('products');
    }
}
