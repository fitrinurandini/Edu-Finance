@extends('layout')

@section('content')
    <h1>Edit Data Pagu Tahunan</h1>

    <form action="{{ route('pagu_tahunans.update', $pagu_tahunan->id) }}" method="POST">
        @csrf
        @method('PUT')
        Tahun Ajaran: <input type="text" name="tahun_ajaran" value="{{ $pagu_tahunan->tahun_ajaran }}"><br>
        Nominal Sumbangan: <input type="text" name="nominal_sumbangan" value="{{ $pagu_tahunan->nominal_sumbangan }}"><br>
        Nominal Atribut: <input type="text" name="nominal_atribut" value="{{ $pagu_tahunan->nominal_atribut }}"><br>
        <button type="submit">Update</button>
    </form>
@endsection
