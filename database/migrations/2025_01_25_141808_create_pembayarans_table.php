<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->enum('jenis_pembayaran', ['sumbangan', 'atribut']);
            $table->string('nama');
            $table->char('jk', 1);
            $table->string('kelas');
            $table->decimal('jumlah', 12, 2);
            $table->date('tanggal_cicilan')->nullable();
            $table->date('cicilan1_date')->nullable();
            $table->decimal('cicilan1', 12, 2)->nullable();
            $table->date('cicilan2_date')->nullable();
            $table->decimal('cicilan2', 12, 2)->nullable();
            $table->date('cicilan3_date')->nullable();
            $table->decimal('cicilan3', 12, 2)->nullable();
            $table->date('cicilan4_date')->nullable();
            $table->decimal('cicilan4', 12, 2)->nullable();
            $table->decimal('sisa', 12, 2);
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
