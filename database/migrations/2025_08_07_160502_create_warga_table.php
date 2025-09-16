<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->enum('jk', ['L', 'P']);
            $table->enum('level', ['warga'])->default('warga');
            $table->text('alamat');
            $table->string('no_rumah');
            $table->string('status');
            $table->string('username')->unique();
            $table->string('password');
            $table->foreignId('id_dues_category')->constrained('dues_categories')->cascadeOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('warga');
    }
};
