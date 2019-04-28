<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidDocumentNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_document_names', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('document_type_id')->unsigned();
            $table->string('slug')->nullable();
            $table->string('name')->nullable();
            $table->timestamps();
            $table->foreign('document_type_id')->references('id')->on('bid_document_types')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_document_names');
    }
}
