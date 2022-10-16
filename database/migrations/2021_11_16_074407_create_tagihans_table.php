<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->string('transaksiID')->unique();
            $table->string('name');
            $table->string('block');
            $table->string('bulan');
            $table->string('tahun');
            $table->integer('m_lalu');
            $table->integer('m_ini');
            $table->integer('pemakaian');
            $table->integer('permeter');
            $table->integer('abodamen');
            $table->integer('denda');
            $table->integer('diskon');
            $table->integer('total');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
}
