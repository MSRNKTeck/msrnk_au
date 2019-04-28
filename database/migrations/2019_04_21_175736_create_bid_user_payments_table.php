<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidUserPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_user_payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('deposit_amount_id')->unsigned();
            $table->integer('order_id')->nullable();
            $table->integer('tracking_id')->nullable();
            $table->tinyinteger('payment_status')->nullable();
            $table->tinyinteger('status')->comment('1:Active;0:Not-Active;');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('deposit_amount_id')->references('id')->on('bid_user_deposit_amounts')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_user_payments');
    }
}
