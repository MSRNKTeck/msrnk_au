<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidVehiclDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_vehicl_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->integer('variant_id')->unsigned();
            $table->integer('fuel')->unsigned();
            $table->integer('bodytype')->unsigned();
            $table->integer('bid_status')->unsigned();

            $table->integer('model_year')->nullable();
            $table->string('number_of_owners')->nullable();
            $table->string('car_color')->nullable();
            $table->string('car_kms_driven')->nullable();
            $table->string('car_reg_num')->nullable();
            $table->string('car_reg_place')->nullable();
            $table->string('car_condition')->nullable();
            $table->string('licence_plate_number')->nullable();
            $table->string('vin_number')->nullable();
            $table->string('purchase_year')->nullable();
            $table->string('insurance_validity')->nullable();
            $table->string('vehicle_value')->nullable();
            $table->integer('min_bid_price')->nullable();
            $table->string('bid_start_time')->nullable();
            $table->string('bid_end_time')->nullable();
            $table->string('bid_date')->nullable();;

            $table->timestamps();
            $table->foreign('make_id')->references('id')->on('bid_makes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('bid_models')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('variant_id')->references('id')->on('bid_variants')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('fuel')->references('id')->on('bid_fuels')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bodytype')->references('id')->on('bid_body_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('bid_status')->references('id')->on('bid_vehicle_statuses')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_vehicl_details');
    }
}
