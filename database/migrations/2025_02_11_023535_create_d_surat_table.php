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
        Schema::create('d_surat', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('no_surat');
            $table->dateTime('tanggal_surat');
            $table->string('perihal');
            $table->char('status');
            $table->string('file');
            $table->foreignId('nip_user')->references('nip')->on('t_user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('d_surat');
    }
};
