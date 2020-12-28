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
            $table->integer('category_id');
            $table->string('category_slug');
            $table->integer('section_id');
            $table->string('product_name');
            $table->string('slug');
            $table->string('main_image')->default('khalid.jpg');
            $table->string('product_multiple_image');//json data
            $table->integer('product_price');
            $table->tinyInteger('status');
            $table->text('product_description');
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->string('meta_keywords')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     *
     *
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
