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
        Schema::create('t_user', function (Blueprint $table) {
            $table->bigInteger('nip')->primary();
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('tanggal_aktif')->nullable();
            $table->dateTime('tanggal_nonaktif')->nullable();
            $table->char('status')->nullable();
            $table->integer('kode_satker');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_user');
    }
};
