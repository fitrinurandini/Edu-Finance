@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Laporan Pembayaran</h1>

    <!-- Form Filter -->
    <div class="row mb-4">
        <div class="col-md-3">
            <form action="{{ route('laporan.tanggal') }}" method="GET">
                <label for="start_date">Start Date:</label>
                <input type="date" name="start_date" required>
                <label for="end_date">End Date:</label>
                <input type="date" name="end_date" required>
                <button type="submit" class="btn btn-primary mt-2">Filter Tanggal</button>
            </form>
        </div>

        <div class="col-md-3">
            <form action="{{ route('laporan.tahun') }}" method="GET">
                <label for="year">Year:</label>
                <input type="number" name="year" min="2000" max="2100" required>
                <button type="submit" class="btn btn-primary mt-2">Filter Tahun</button>
            </form>
        </div>

        <div class="col-md-3">
            <form action="{{ route('laporan.bulan') }}" method="GET">
                <label for="month">Month:</label>
                <select name="month" class="form-select" required>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <!-- Lengkapi sampai Desember -->
                </select>
                <button type="submit" class="btn btn-primary mt-2">Filter Bulan</button>
            </form>
        </div>

        <div class="col-md-3">
            <form action="{{ route('laporan.kelas') }}" method="GET">
                <label for="kelas">Kelas:</label>
                <select name="kelas" class="form-select" required>
                    <option value="XII RPL 2">XII RPL 2</option>
                    <option value="XII TKJ 1">XII TKJ 1</option>
                    <!-- Lengkapi kelas lainnya -->
                </select>
                <button type="submit" class="btn btn-primary mt-2">Filter Kelas</button>
            </form>
        </div>
    </div>

    <!-- Tabel Laporan -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Jenis Pembayaran</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Kelas</th>
                <th>Jumlah</th>
                <th>Tanggal Bayar</th>
                <th>Sisa</th>
            </tr>
        </thead>
        <tbody>
            @foreach($laporan as $pembayaran)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pembayaran->jenis_pembayaran }}</td>
                <td>{{ $pembayaran->nama }}</td>
                <td>{{ $pembayaran->jenis_kelamin }}</td>
                <td>{{ $pembayaran->kelas }}</td>
                <td>{{ $pembayaran->jumlah }}</td>
                <td>{{ $pembayaran->tanggal_bayar }}</td>
                <td>{{ $pembayaran->sisa }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
