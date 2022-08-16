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
        Schema::create('request_barangs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('foto_produk', 100);
            $table->string('nama_produk', 50);
            $table->integer('harga');
            $table->longText('deskripsi', 200);
            $table->string('categories',50);
            $table->string('Alamat',100);
            $table->enum('status', ['1','2',3])->comment('1 = Belum  dikonfirmasi, 2 = konfirmasi ,3 = ditolak');
            $table->longText('alasan');
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
        Schema::dropIfExists('request_barangs');
    }
};
