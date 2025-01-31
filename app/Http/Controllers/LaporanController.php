<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pembayaran;

class LaporanController extends Controller
{
    // Report berdasarkan tanggal
    public function reportByTanggal(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;

        $laporan = Pembayaran::whereBetween('tanggal_bayar', [$startDate, $endDate])->get();

        return view('laporan.index', compact('laporan'));
    }

    // Report berdasarkan tahun
    public function reportByTahun(Request $request)
    {
        $year = $request->year;

        $laporan = Pembayaran::whereYear('tanggal_bayar', $year)->get();

        return view('laporan.index', compact('laporan'));
    }

    // Report berdasarkan bulan
    public function reportByBulan(Request $request)
    {
        $month = $request->month;

        $laporan = Pembayaran::whereMonth('tanggal_bayar', $month)->get();

        return view('laporan.index', compact('laporan'));
    }

    // Report berdasarkan kelas
    public function reportByKelas(Request $request)
    {
        $kelas = $request->kelas;

        $laporan = Pembayaran::where('kelas', $kelas)->get();

        return view('laporan.index', compact('laporan'));
    }
}

