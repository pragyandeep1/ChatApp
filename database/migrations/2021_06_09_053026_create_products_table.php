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
            $table->string('type');
            $table->string('seller_name');
            $table->string('product_title');
            $table->string('product_description');
            $table->string('specification');
            $table->string('packaging_type');
            $table->string('color');
            $table->string('packagingsize');
            $table->string('image');
            $table->text('special_feature');
            $table->string('brand');
            $table->text('country_origin');
            $table->string('expiry_date');
            $table->string('order_quantity');
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
