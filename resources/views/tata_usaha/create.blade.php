<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Pembayaran</title>
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">
    <div class="container mt-5">
        <h1 class="mb-4">Tambah Data Pembayaran</h1>

        <!-- Flash Message -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('tata_usaha.store') }}" method="POST">
            @csrf

            <!-- Jenis Pembayaran -->
            <div class="mb-3">
                <label for="jenis_pembayaran">Jenis Pembayaran:</label>
                <select name="jenis_pembayaran" id="jenis_pembayaran" class="form-control" required>
                    <option value="" disabled selected>Pilih Jenis Pembayaran</option>
                    <option value="sumbangan">Sumbangan</option>
                    <option value="atribut">Atribut</option>
                </select>
                @error('jenis_pembayaran')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Nama -->
            <div class="mb-3">
                <label for="nama">Nama:</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama') }}" required>
                @error('nama')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jenis Kelamin -->
            <div class="mb-3">
                <label for="jk">Jenis Kelamin:</label>
                <select name="jk" id="jk" class="form-control" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="L">Laki-laki</option>
                    <option value="P">Perempuan</option>
                </select>
                @error('jk')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Kelas -->
            <div class="mb-3">
                <label for="kelas">Kelas:</label>
                <input type="text" name="kelas" id="kelas" class="form-control" value="{{ old('kelas') }}" required>
                @error('kelas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Jumlah -->
            <div class="mb-3">
                <label for="jumlah">Jumlah:</label>
                <input type="number" name="jumlah" id="jumlah" class="form-control" min="0" step="0.01" value="{{ old('jumlah') }}" required>
                @error('jumlah')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>


            <!-- Submit Button -->
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
