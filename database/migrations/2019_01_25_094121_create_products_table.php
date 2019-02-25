<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('product_id');
            $table->string('name');
            $table->string('slug');
            $table->string('thumbnail')->nullalbe();
            $table->integer('price');
            $table->string('screen_size');
            $table->string('operating_system');
            $table->string('cpu');
            $table->string('ram');
            $table->string('camera');
            $table->string('memories');
            $table->string('pin');
            $table->binary('status')->nullalbe();
            $table->integer('cat_id')->unsigned();
            $table->foreign('cat_id')->references('company_id')->on('company')->onDelete('cascade');
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
