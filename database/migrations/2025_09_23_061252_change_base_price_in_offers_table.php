<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBasePriceInOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->unsignedInteger('base_price')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('offers', function (Blueprint $table) {
            $table->decimal('base_price', 10, 2)->nullable(false)->change();
        });
    }
}
