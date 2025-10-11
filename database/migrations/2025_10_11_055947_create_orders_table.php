<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->tinyInteger('status')->default(0);
            $table->bigInteger('total_amount');
            $table->bigInteger('delivery_amount')->default(0);
            $table->unsignedBigInteger('delivery_option_id')->nullable();
            $table->bigInteger('offer_amount');
            $table->bigInteger('paying_amount');
            $table->tinyInteger('payment_status')->default(0);
            $table->unsignedBigInteger('address_id')->nullable();
            $table->string('shipment_code')->nullable();
            $table->tinyInteger('order_type')->default(0);
            $table->longText('description')->nullable();
            $table->string('slug')->nullable();
            $table->softDeletes('deleted_at');
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
        Schema::dropIfExists('orders');
    }
}
