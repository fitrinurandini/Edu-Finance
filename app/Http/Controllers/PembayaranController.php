<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $data = Pembayaran::all();
        return view('pembayaran.index', compact('data'));
    }

    public function create()
    {
        return view('tata_usaha.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'jk' => 'required',
            'kelas' => 'required',
            'jumlah' => 'required|numeric',
            'sisa' => 'required|numeric',
        ]);

        Pembayaran::create($request->all());
        return redirect()->route('tata_usaha.index')->with('success', 'Data pembayaran berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $pembayaran = Pembayaran::find($id);
        return view('tata_usaha.edit', compact('pembayaran'));
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required',
        'jk' => 'required',
        'kelas' => 'required',
        'jumlah' => 'required',
        'sisa' => 'required',
    ]);

    $pembayaran = Pembayaran::findOrFail($id);
    $pembayaran->update([
        'nama' => $request->nama,
        'jk' => $request->jk,
        'kelas' => $request->kelas,
        'jumlah' => $request->jumlah,
        'sisa' => $request->sisa,
    ]);

    return redirect()->route('tata_usaha.index')->with('success', 'Data Pembayaran berhasil diupdate');
}


    public function destroy($id)
    {
        Pembayaran::find($id)->delete();
        return redirect()->route('tata_usaha.index')->with('success', 'Data pembayaran berhasil dihapus.');
    }

    public function pay($id)
    {
        $pembayaran = Pembayaran::findOrFail($id);
        
        // Pass payment details to the view
        return view('tata_usaha.pay', compact('pembayaran'));
    }

  

public function processPayment(Request $request, $id)
{
    $pembayaran = Pembayaran::findOrFail($id); // Cari data pembayaran berdasarkan ID

    $cicilanNumber = $request->input('cicilan_number'); // Cicilan yang dipilih
    $amount = $request->input('amount'); // Jumlah yang dibayar

    // Validasi jumlah pembayaran tidak boleh lebih dari sisa cicilan
    if ($cicilanNumber == 1 && $pembayaran->cicilan1 < $amount) {
        return redirect()->back()->with('error', 'Jumlah pembayaran melebihi sisa cicilan 1');
    }
    if ($cicilanNumber == 2 && $pembayaran->cicilan2 < $amount) {
        return redirect()->back()->with('error', 'Jumlah pembayaran melebihi sisa cicilan 2');
    }
    if ($cicilanNumber == 3 && $pembayaran->cicilan3 < $amount) {
        return redirect()->back()->with('error', 'Jumlah pembayaran melebihi sisa cicilan 3');
    }
    if ($cicilanNumber == 4 && $pembayaran->cicilan4 < $amount) {
        return redirect()->back()->with('error', 'Jumlah pembayaran melebihi sisa cicilan 4');
    }

    // Proses pembayaran sesuai dengan cicilan yang dipilih
    switch ($cicilanNumber) {
        case 1:
            if ($pembayaran->cicilan1 >= $amount) {
                $pembayaran->cicilan1 -= $amount; // Kurangi cicilan 1
            }
            break;

        case 2:
            if ($pembayaran->cicilan2 >= $amount) {
                $pembayaran->cicilan2 -= $amount; // Kurangi cicilan 2
            }
            break;

        case 3:
            if ($pembayaran->cicilan3 >= $amount) {
                $pembayaran->cicilan3 -= $amount; // Kurangi cicilan 3
            }
            break;

        case 4:
            if ($pembayaran->cicilan4 >= $amount) {
                $pembayaran->cicilan4 -= $amount; // Kurangi cicilan 4
            }
            break;
    }

    // Kurangi sisa pembayaran berdasarkan jumlah pembayaran
    $pembayaran->sisa -= $amount;

    // Pastikan sisa tidak menjadi negatif
    if ($pembayaran->sisa < 0) {
        $pembayaran->sisa = 0;
    }

    // Set tanggal pembayaran otomatis menggunakan Carbon
    $pembayaran->tanggal_pembayaran = Carbon::now();

    // Simpan perubahan ke database
    $pembayaran->save();

    return redirect()->route('tata_usaha.index')->with('success', 'Pembayaran berhasil!');
}


}
