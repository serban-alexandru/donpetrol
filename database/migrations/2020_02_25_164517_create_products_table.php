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
            $table->bigIncrements('id');
            $table->string('name');
            $table->float('price');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('category_id');
            $table->string('table_number');
            $table->string('table_part');

            // bonus fields
            $table->string('article_id');
            $table->string('article_number');
            $table->string('article_name');
            $table->string('department_id');
            $table->string('department_number');
            $table->string('department_name');
            $table->string('group_name');
            $table->string('category_name');
            // end bonus fields

            $table->timestamps();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
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
