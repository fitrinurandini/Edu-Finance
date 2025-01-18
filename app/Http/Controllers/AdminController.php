<?php

namespace App\Http\Controllers;

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
        return view('tata_usaha.index');
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
