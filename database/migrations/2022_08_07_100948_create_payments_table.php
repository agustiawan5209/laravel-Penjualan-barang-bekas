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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onUpdate('cascade');
            $table->string('number', 16);
            $table->decimal('total_price', 10, 2);
            $table->string('payment_status', 200);
            $table->string('payment_type', 50)->nullable();
            $table->string('payment_code', 50)->nullable();
            $table->string('pdf_url', 200)->nullable();
            $table->string('transaksi_id')->nullable();
            $table->string('snap_token', 36)->nullable();
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
        Schema::dropIfExists('payments');
    }
};
