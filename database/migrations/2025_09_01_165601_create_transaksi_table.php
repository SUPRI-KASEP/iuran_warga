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

        Schema::create('transaksi', function (Blueprint $table) {


            $table->id();
            $table->string('kode_transaksi')->unique();
            $table->string('nama_pengguna');
            $table->date('tanggal_transaksi');
            $table->enum('jenis_transaksi', ['mingguan','bulanan','tahunan']);
            $table->integer('id_dc')->nullable();
            $table->decimal('jumlah', 12, 2);
            $table->timestamps();

        });

        Schema::create('pembayaran', function (Blueprint $table) {


            $table->id();
            $table->foreignId('transaksi_id')->constrained('transaksi')->onDelete('cascade');
            $table->decimal('amount', 12, 2);
            $table->date('tanggal_bayar');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi');
        Schema::dropIfExists('transaksi');
    }
};
