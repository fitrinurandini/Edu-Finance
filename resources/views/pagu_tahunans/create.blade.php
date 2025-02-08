@extends('layout')

@section('content')
    <h1>Tambah Data Pagu Tahunan</h1>

    <form action="{{ route('pagu_tahunans.store') }}" method="POST">
        @csrf
        Tahun Ajaran: <input type="text" name="tahun_ajaran" value="{{ old('tahun_ajaran') }}"><br>
        Nominal Sumbangan: <input type="text" name="nominal_sumbangan" value="{{ old('nominal_sumbangan') }}"><br>
        Nominal Atribut: <input type="text" name="nominal_atribut" value="{{ old('nominal_atribut') }}"><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
