<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('penjualan', function (Blueprint $table) {
            $table->increments('faktur');
            $table->unsignedInteger('nopelanggan'); 
            $table->unsignedInteger('kodebarang'); 
            $table->string('tanggalpenjualan', 25);
            $table->timestamps();
    
            $table->foreign('nopelanggan')->references('nopelanggan')->on('pelanggan')->onDelete('cascade');
            $table->foreign('kodebarang')->references('kodebarang')->on('barang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penjualans');
    }
};
