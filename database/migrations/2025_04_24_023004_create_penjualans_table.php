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
            $table->unsignedInteger('nopelanggan')->nullable(); // Ubah menjadi nullable
            $table->unsignedInteger('kodebarang')->nullable(); // Ubah menjadi nullable
            $table->string('tanggalpenjualan', 25);
            $table->timestamps();
    
            $table->foreign('nopelanggan')
                ->references('nopelanggan')
                ->on('pelanggan')
                ->onDelete('set null'); // Ubah menjadi set null

            $table->foreign('kodebarang')
                ->references('kodebarang')
                ->on('barang')
                ->onDelete('set null'); // Ubah menjadi set null
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
