<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengembalians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksis');
            $table->string('gambar', 100);
            $table->string('alasan');
            $table->enum('kondisi', ['1', '2', '3', '4', '5'])->comment('1 =Paket Tidak sama, 2 = Produk Rusak,  3 = Pembungkus Paket Sobek/Rusak, 4 = Paket Salah , 5 = alasan lain');
            $table->string('kondisi_lain')->nullable();
            $table->enum('status', ['0', '1', '2', '3'])->default('0')->comment('0 = default, 1 = Ditolak, 2 = Diterima, 3= selesai');
            $table->string('admin_ket')->nullable();
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
        Schema::dropIfExists('pengembalians');
    }
};
