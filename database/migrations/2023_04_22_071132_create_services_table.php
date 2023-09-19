<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('seller_name');
            $table->string('address');
            $table->string('phone');
            $table->integer('is_whatsapp');
            $table->float('price');
            $table->string('unit');
            $table->string('features');
            $table->string('payment_mode');
            $table->text('special_feature');
            $table->string('service_highlight');
            $table->text('from_date');
            $table->string('to_date');
            $table->string('question');
            $table->string('answer');
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
        Schema::dropIfExists('services');
    }
}
