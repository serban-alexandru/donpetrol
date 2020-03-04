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
            $table->bigIncrements('id');
            $table->string('name')->default('order');
            $table->string('type'); // eat in / take out 
            $table->unsignedBigInteger('user_id');
            // data from form
            $table->string('street_and_house');
            $table->string('postcode');
            $table->string('place_name');
            $table->string('client_name');
            $table->string('email');
            $table->string('phone');
            $table->string('company_name');
            $table->string('delivery_time');
            $table->text('comments');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
