<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Nama tabel (opsional, jika nama tabel bukan default "pembayarans")
    protected $table = 'pembayarans';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'jenis_pembayaran',
        'nama',       // Nama siswa
        'jk',         // Jenis kelamin
        'kelas',      // Kelas siswa
        'jumlah',     // Jumlah pembayaran
        'cicilan1',   // Cicilan pertama
        'tgl_cicilan1', // Tanggal cicilan pertama
        'cicilan2',   // Cicilan kedua
        'tgl_cicilan2', // Tanggal cicilan kedua
        'sisa',       // Sisa pembayaran
    ];

    // Jika ada kolom yang ingin diformat, tambahkan accessor atau mutator
    protected $casts = [
        'tgl_cicilan1' => 'datetime',
        'tgl_cicilan2' => 'datetime',
    ];
}
