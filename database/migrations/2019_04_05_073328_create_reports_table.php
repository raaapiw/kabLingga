<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reports', function (Blueprint $table) {
            $table->increments('id'); 
            $table->integer('shipping_id')->unsigned();
            $table->string('name_report')->nullable();
            $table->string('field_report')->nullable();
            $table->string('evidence')->nullable();
            $table->integer('name_spv')->nullable();
            $table->string('barcode')->nullable();
            $table->integer('state')->nullable();

            $table->timestamps();
            $table->foreign('shipping_id')
            ->references('id')->on('shippings')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reports');
    }
}
