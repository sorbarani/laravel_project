<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('offers', function (Blueprint $table) {
            //drop old column
            $table->dropColumn(['start_at', 'end_at', 'base_price', 'value', 'percent']);

            // add new columns
            $table->json('config')->nullable()->after('name');
            $table->string('token')->nullable()->after('count');
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
            // rollback = drop new columns, re-add old ones
            $table->dropColumn(['config', 'token']);

            $table->integer('value')->nullable();
            $table->decimal('base_price', 10, 2)->nullable();
            $table->dateTime('start_at')->nullable();
            $table->dateTime('end_at')->nullable();
            $table->unsignedTinyInteger('percent')->nullable();
        });
    }
}
