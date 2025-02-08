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
        Schema::create('pagu_tahunans', function (Blueprint $table) {
            $table->id();
            $table->string('tahun_ajaran');
            $table->decimal('nominal_sumbangan', 15, 2);
            $table->decimal('nominal_atribut', 15, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagu_tahunans');
    }
};
