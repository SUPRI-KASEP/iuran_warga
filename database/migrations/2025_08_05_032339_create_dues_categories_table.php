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
        Schema::create('dues_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // nama kategori
            $table->enum('periode', ['mingguan', 'bulanan', 'tahunan'])->default('bulanan');
            $table->bigInteger('amount'); // nominal
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif'); // status
            $table->text('description')->nullable(); // deskripsi opsional
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dues_categories');
    }
};
