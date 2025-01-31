@extends('layout')

@section('content')
    <h2>Tambah Siswa</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        NISN: <input type="text" name="nisn" value="{{ old('nisn') }}"><br>
        NIS: <input type="text" name="nis" value="{{ old('nis') }}"><br>
        Nama: <input type="text" name="nama" value="{{ old('nama') }}"><br>
        Jenis Kelamin:
        <select name="jenis_kelamin">
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select><br>
        <button type="submit">Simpan</button>
    </form>
@endsection
