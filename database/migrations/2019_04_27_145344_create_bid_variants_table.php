<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidVariantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_variants', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('make_id')->unsigned();
            $table->integer('model_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->timestamps();
            $table->foreign('make_id')->references('id')->on('bid_makes')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('model_id')->references('id')->on('bid_models')->onUpdate('cascade')->onDelete('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_variants');
    }
}
