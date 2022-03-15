<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',70)->nullable();
            $table->string('phone',15);
            $table->string('address',100);
            $table->string('photo',50);
            $table->string('shopename',100)->nullable();
            $table->string('account_holder',50)->nullable();
            $table->string('account_number',50)->nullable();
            $table->string('bank_name',80)->nullable();
            $table->string('bank_branch',80)->nullable();
            $table->string('city',60)->nullable();
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
        Schema::dropIfExists('customers');
    }
}
