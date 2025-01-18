<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index()
    {
        return view('login');
    }
    function login(Request $request)
    {
        $request->validate([
            'nis' => 'required',
            'password' => 'required'
        ],[
            'nis.required' => 'nis wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);
    
    $infologin = [
        'nis'=>$request->nis,
        'password'=>$request->password,
    ];

    if(Auth::attempt($infologin)){
        if(Auth::user()->role == 'kepala_sekolah'){
            return redirect('kepala_sekolah');
        } elseif (Auth::user()->role == 'tata_usaha'){
            return redirect('tata_usaha');
        } elseif (Auth::user()->role == 'ketua_akuntansi'){
            return redirect('ketua_akuntansi');
        } elseif (Auth::user()->role == 'wali_kelas'){
            return redirect('walikelas');
        } elseif (Auth::user()->role == 'orang_tua'){
            return redirect('orangtua'); 
        }       
    } else {
        return redirect('')->withErrors('Username dan password yang di masukan tidak sesuai')->withInput();
    }

    }

    function logout(){
        Auth::logout();
        return redirect('');
    }
}
