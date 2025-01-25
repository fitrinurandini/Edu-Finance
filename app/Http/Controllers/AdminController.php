<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;    

class AdminController extends Controller
{
    function kepala_sekolah()
    {
        return view('kepala_sekolah.index');
    }
    function tata_usaha()
    {
        $data = Pembayaran::all();
        return view('tata_usaha.index', compact('data'));
    }
    function ketua_akuntansi()
    {
        return view('ketua_akutansi.index');
    }
    function wali_kelas()
    {
        return view('walikelas.index');
    }
    function orang_tua()
    {
        return view('orangtua.index');
    }
}
