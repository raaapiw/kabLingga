<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('client_id')->unsigned();
            $table->string('tongkang')->nullable();
            $table->string('loading_plan')->nullable();
            $table->string('quantity')->nullable();
            $table->string('tax_proof')->nullable();
            $table->string('no_tax')->nullable();
            $table->string('tgl_tax')->nullable();
            $table->string('packing_list')->nullable();
            $table->string('invoice')->nullable();
            $table->string('tempat_pemeriksaan')->nullable();
            $table->string('pelabuhan_tujuan')->nullable();
            $table->string('pelabuhan_muat')->nullable();
            $table->string('no_lsl')->nullable();
            $table->string('no_ko')->nullable();
            $table->string('tgl_ko')->nullable();
            $table->string('tgl_pemeriksaan')->nullable();
            $table->string('jenis_produk')->nullable();

            $table->timestamps();

            $table->foreign('client_id')
            ->references('id')->on('clients')
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
        Schema::dropIfExists('shippings');
    }
}
