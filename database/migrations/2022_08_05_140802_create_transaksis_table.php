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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('ID_transaksi', 50);
            $table->date('tgl_transaksi');
            $table->text('item_details');
            $table->foreignId('barang_id');
            $table->bigInteger('potongan');
            $table->string('total');
            $table->enum('status', ['0','1'])->default('0')->comment('0 = Diterima, 1 = Dikembalikan');
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
        Schema::dropIfExists('transaksis');
    }
};
