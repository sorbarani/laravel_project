<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // name of the offer.
            $table->integer('value');// If the value exist we use value in payment also we use percent.
            $table->decimal('base_price', 10, 2);
            $table->dateTime('start_at'); // when the offer start.
            $table->dateTime('end_at');  // when the offer end.
            $table->unsignedTinyInteger('percent'); // If the percent exist we use percent in payment also we use value.
            $table->unsignedInteger('count')->nullable();//this shows us how many time we can use the offer.
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('offers');
    }
}
