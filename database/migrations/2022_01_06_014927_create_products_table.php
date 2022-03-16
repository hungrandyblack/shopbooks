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
            $table->softDeletes();
            $table->integer("discount_price");
            $table->longText('description');
            $table->string('image',255);
            $table->string("name",255);
            $table->integer('quantity');
            $table->integer('price');
            $table->string("status",255);
            $table->unsignedBigInteger("category_id");
            $table->foreign('category_id')->references('id')->on('categories');
            $table->string("supplier_id",255);
            $table->string("author_id",255);
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
