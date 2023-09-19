<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFreelistingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertise-with-us', function (Blueprint $table) {
            $table->id();
            $table->string('companyName');
            $table->string('city');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('mobileNumber');
            $table->string('landlineNumber');
            $table->string('nameprefix');
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
        Schema::dropIfExists('freelistings');
    }
}
