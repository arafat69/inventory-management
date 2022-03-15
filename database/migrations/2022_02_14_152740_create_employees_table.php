<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name',50);
            $table->string('email',70);
            $table->string('phone',15);
            $table->string('address',100)->nullable();
            $table->string('experience',100)->nullable();
            $table->string('nid_no',30)->nullable();
            $table->string('photo',50);
            $table->string('salary',100)->nullable();
            $table->string('vacation',80)->nullable();
            $table->string('city',60)->nullable();
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
        Schema::dropIfExists('employees');
    }
}
