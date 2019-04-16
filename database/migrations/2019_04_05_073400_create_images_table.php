<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shipping_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('evidence')->nullable();
            $table->string('pics1')->nullable();
            $table->string('pics2')->nullable();
            $table->string('pics3')->nullable();
            $table->string('pics4')->nullable();

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
        Schema::dropIfExists('images');
    }
}
