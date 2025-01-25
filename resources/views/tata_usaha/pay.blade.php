<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bayar Cicilan - {{ $pembayaran->nama }}</title>

    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('component/headertu')

        <div class="container">
            <h1>Bayar Cicilan</h1>

            <h4>Nama: {{ $pembayaran->nama }}</h4>
            <h4>Kelas: {{ $pembayaran->kelas }}</h4>
            <h4>Jenis Pembayaran: {{ ucfirst($pembayaran->jenis_pembayaran) }}</h4>
            <h4>Sisa Pembayaran: Rp {{ number_format($pembayaran->sisa, 2, ',', '.') }}</h4>

            <form action="{{ route('tata_usaha.process_payment', $pembayaran->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>Cicilan yang Dibayar</label>
                    <select name="cicilan_number" class="form-control" required>
                        <option value="1" {{ $pembayaran->cicilan1 > 0 ? '' : '' }}>Cicilan 1</option>
                        <option value="2" {{ $pembayaran->cicilan2 > 0 ? '' : '' }}>Cicilan 2</option>
                        <option value="3" {{ $pembayaran->cicilan3 > 0 ? '' : '' }}>Cicilan 3</option>
                        <option value="4" {{ $pembayaran->cicilan4 > 0 ? '' : '' }}>Cicilan 4</option>
                    </select>
                </div>
                
                <div class="mb-3">
                    <label>Jumlah Pembayaran</label>
                    <input type="number" name="amount" class="form-control" value="{{ old('amount') }}" required>
                </div>
                
                <button type="submit" class="btn btn-primary">Bayar</button>
            </form>
        </div>
    </div>
    <!-- End of Page Wrapper -->

    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>

</body>

</html>
