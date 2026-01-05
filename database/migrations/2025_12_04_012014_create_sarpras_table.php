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
        Schema::create('sarpras', function (Blueprint $table) {
                        $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->string('kategori');
            $table->string('lokasi');
            $table->integer('jumlah');
            $table->enum('kondisi', ['Baik', 'Perbaikan', 'Rusak']);
            $table->date('tanggal')->nullable();
            $table->date('tanggal_perbaikan')->nullable();
            $table->text('hasil_rekondisi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sarpras');
    }
};
