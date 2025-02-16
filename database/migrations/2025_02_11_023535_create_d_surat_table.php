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
            $table->char('status')->nullable();
            $table->string('original_file_name');
            $table->string('generated_file_name');
            $table->bigInteger('nip_user')->nullable();
            $table->foreign('nip_user')->references('nip')->on('t_user')->onDelete('cascade');
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
