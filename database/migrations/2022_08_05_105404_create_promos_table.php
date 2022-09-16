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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('thumbnail', 100)->nullable()->comment('Thumbnail Untuk Pemasangan Iklan');
            $table->string('kode_promo');
            $table->string('category_id',10)->nullable();
            $table->integer('max_user')->nullable();
            $table->integer('use_user')->nullable()->default('0');
            $table->integer('promo_persen')->nullable();
            $table->bigInteger('promo_nominal')->nullable();
            $table->date('tgl_mulai');
            $table->date('tgl_kadaluarsa');
            $table->softDeletes();
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
        Schema::dropIfExists('promos');
    }
};
