<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBidUserDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bid_user_documents', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('document_type_id')->unsigned();
            $table->integer('document_name_id')->unsigned();
            $table->string('number')->nullable();
            $table->string('file')->nullable();
            $table->integer('document_status');
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('document_type_id')->references('id')->on('bid_document_types')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('document_name_id')->references('id')->on('bid_document_names')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bid_user_documents');
    }
}
