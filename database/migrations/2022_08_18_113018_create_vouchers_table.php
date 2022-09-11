<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->string('kode_voucher');
            $table->bigInteger('diskon');
            $table->foreignId('barang_id')->constrained('barangs')->onDelete('cascade');
            $table->string('deskripsi');
            $table->integer('max_user')->nullable();
            $table->integer('use_user')->nullable()->default('0');
            $table->date('tgl_mulai');
            $table->date('tgl_kadaluarsa');
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
        Schema::dropIfExists('vouchers');
    }
};
