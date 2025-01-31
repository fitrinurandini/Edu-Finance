@extends('layout')

@section('content')
    <h2>Edit Siswa</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        NISN: <input type="text" name="nisn" value="{{ $student->nisn }}"><br>
        NIS: <input type="text" name="nis" value="{{ $student->nis }}"><br>
        Nama: <input type="text" name="nama" value="{{ $student->nama }}"><br>
        Jenis Kelamin:
        <select name="jenis_kelamin">
            <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
            <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
        </select><br>
        <button type="submit">Update</button>
    </form>
@endsection
