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
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->integer('jumlah_pembelian')->default('0')->nullable();
            $table->string('deskripsi');
            $table->enum('jenis_voucher', ['0','1','2','3'])->default('0')->comment('0 = Umum, 1 = User Baru, 2 = User Membeli Lebih Dari 3, 3 = Barang ');
            $table->integer('use_user')->nullable()->default('0');

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
