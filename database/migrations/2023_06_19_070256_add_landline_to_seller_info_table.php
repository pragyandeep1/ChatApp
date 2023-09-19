<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLandlineToSellerInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sellerinfos', function (Blueprint $table) {
            $table->string('landlineNumber')->nullable();
            $table->string('nameprefix')->nullable();
            $table->string('city')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sellerinfos', function (Blueprint $table) {
            $table->dropColumn('landlineNumber');
            $table->dropColumn('nameprefix');
            $table->dropColumn('city');
        });
    }
}
