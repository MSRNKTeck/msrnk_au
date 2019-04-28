<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidVehiclImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_vehicl_images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('vehicle_detail_id')->unsigned();
            $table->string('images')->nullable();
            $table->timestamps();
            $table->foreign('vehicle_detail_id')->references('id')->on('bid_vehicl_details')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_vehicl_images');
    }
}
