<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellerinfos', function (Blueprint $table) {
            $table->id();
            $table->string('company_name');
            $table->string('seller_name');
            $table->string('full_address');
            $table->string('phone');
            $table->string('email');
            $table->string('longitude');
            $table->string('password');
            $table->string('opening_time');
            $table->string('pan_no');
            $table->string('year_drp_down');
            $table->string('latitude');
            $table->string('business_hr');
            $table->string('gst_no');
            $table->string('closing_time');
            $table->string('image');
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
        Schema::dropIfExists('sellerinfos');
    }
}
