<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Manajemen Data Pembayaran">
    <meta name="author" content="">

    <title>Data Pembayaran</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        @include('component/headertu')
        <!-- End Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">
            <!-- Main Content -->
            <div id="content">

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Manajemen Data Pembayaran</h1>

                    <!-- Success Message -->
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <!-- Button Tambah -->
                    <a href="{{ route('tata_usaha.create') }}" class="btn btn-primary mb-3">
                        <i class="fas fa-plus"></i> Tambah Data Pembayaran
                    </a>

                    <!-- Table -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Data Pembayaran</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Pembayaran</th>
                                            <th>Nama</th>
                                            <th>JK</th>
                                            <th>Kelas</th>
                                            <th>Jumlah</th>
                                            <th>Tanggal Cicilan 1</th>
                                            <th>Cicilan 1</th>
                                            <th>Tanggal Cicilan 2</th>
                                            <th>Cicilan 2</th>
                                            <th>Tanggal Cicilan 3</th>
                                            <th>Cicilan 3</th>
                                            <th>Tanggal Cicilan 4</th>
                                            <th>Cicilan 4</th>
                                            <th>Sisa</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data as $key => $item)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ ucfirst($item->jenis_pembayaran) }}</td>
                                                <td>{{ $item->nama }}</td>
                                                <td>{{ $item->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                                <td>{{ $item->kelas }}</td>
                                                <td>Rp {{ number_format($item->jumlah, 2, ',', '.') }}</td>
                                                <td>{{ $item->cicilan1_date ? \Carbon\Carbon::parse($item->cicilan1_date)->format('d-m-Y') : '-' }}</td>
                                                <td>{{ $item->cicilan1 }}</td>
                                                <td>{{ $item->cicilan2_date ? \Carbon\Carbon::parse($item->cicilan2_date)->format('d-m-Y') : '-' }}</td>
                                                <td>{{ $item->cicilan2 }}</td>
                                                <td>{{ $item->cicilan3_date ? \Carbon\Carbon::parse($item->cicilan3_date)->format('d-m-Y') : '-' }}</td>
                                                <td>{{ $item->cicilan3 }}</td>
                                                <td>{{ $item->cicilan4_date ? \Carbon\Carbon::parse($item->cicilan4_date)->format('d-m-Y') : '-' }}</td>
                                                <td>{{ $item->cicilan4 }}</td>
                                                <td>Rp {{ number_format($item->sisa, 2, ',', '.') }}</td>
                                                <td>
                                                    <a href="{{ route('tata_usaha.pay', $item->id) }}" class="btn btn-success btn-sm">
                                                        <i class="fas fa-credit-card"></i> Bayar
                                                    </a>
                                                    <a href="{{ route('tata_usaha.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                                        <i class="fas fa-edit"></i> Edit
                                                    </a>
                                                    <form action="{{ route('tata_usaha.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                                            <i class="fas fa-trash"></i> Hapus
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- End Main Content -->

            <!-- Footer -->
            <!-- End Footer -->
        </div>
        <!-- End Content Wrapper -->
    </div>
    <!-- End Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Scripts -->
    <script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
</body>

</html>
