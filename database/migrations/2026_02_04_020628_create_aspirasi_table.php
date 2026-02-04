<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('aspirasi', function (Blueprint $table) {
            $table->id('id_aspirasi');

            $table->unsignedBigInteger('id_user');
            $table->unsignedBigInteger('id_kategori');

            $table->string('judul');
            $table->text('deskripsi');
            $table->date('tanggal');
            $table->enum('status', ['Baru', 'Diproses', 'Selesai'])->default('Baru');

            $table->timestamps();

            $table->foreign('id_user')
                  ->references('id_user')
                  ->on('users')
                  ->onDelete('cascade');

            $table->foreign('id_kategori')
                  ->references('id_kategori')
                  ->on('kategori')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('aspirasi');
    }
};
