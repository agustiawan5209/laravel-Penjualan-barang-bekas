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
        Schema::create('ongkirs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("payment_id");
            $table->date('tgl_pengiriman');
            $table->bigInteger('harga')->nullable();
            $table->string('kode_pos',10)->nullable();
            $table->string('kabupaten',20)->nullable();
            $table->string('detail_alamat',20)->nullable();
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
        Schema::dropIfExists('ongkirs');
    }
};
