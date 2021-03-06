<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('nama_PT')->nullable();
            $table->string('no_iup')->nullable();
            $table->string('tgl_iup')->nullable();
            $table->string('address')->nullable();
            $table->string('iup_expired')->nullable();
            $table->string('npwp')->nullable();
            $table->string('tgl_npwp')->nullable();
            $table->string('tdp_nib')->nullable();
            
            $table->timestamps();

            $table->foreign('user_id')
            ->references('id')->on('users')
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
        Schema::dropIfExists('clients');
    }
}
