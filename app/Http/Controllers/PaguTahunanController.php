<?php

namespace App\Http\Controllers;

use App\Models\PaguTahunan;
use Illuminate\Http\Request;

class PaguTahunanController extends Controller
{
    public function index()
    {
        $pagu_tahunans = PaguTahunan::all();
        return view('pagu_tahunans.index', compact('pagu_tahunans'));
    }

    public function create()
    {
        return view('pagu_tahunans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'nominal_sumbangan' => 'required|numeric',
            'nominal_atribut' => 'required|numeric',
        ]);

        PaguTahunan::create($request->all());

        return redirect()->route('pagu_tahunans.index')->with('success', 'Data Pagu Tahunan berhasil ditambahkan');
    }

    public function edit(PaguTahunan $pagu_tahunan)
    {
        return view('pagu_tahunans.edit', compact('pagu_tahunan'));
    }

    public function update(Request $request, PaguTahunan $pagu_tahunan)
    {
        $request->validate([
            'tahun_ajaran' => 'required',
            'nominal_sumbangan' => 'required|numeric',
            'nominal_atribut' => 'required|numeric',
        ]);

        $pagu_tahunan->update($request->all());

        return redirect()->route('pagu_tahunans.index')->with('success', 'Data Pagu Tahunan berhasil diperbarui');
    }

    public function destroy(PaguTahunan $pagu_tahunan)
    {
        $pagu_tahunan->delete();

        return redirect()->route('pagu_tahunans.index')->with('success', 'Data Pagu Tahunan berhasil dihapus');
    }
}
