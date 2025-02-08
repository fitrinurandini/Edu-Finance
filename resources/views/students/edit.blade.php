<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit Data Siswa</title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- Custom styles for this template-->
    <link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        @include('component/headertu')

        <div class="container">
            <h1>Edit Data Siswa</h1>
            <form action="{{ route('students.update', $student->id) }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label>NISN</label>
                    <input type="text" name="nama" class="form-control" value="{{ $student->nisn }}" required>
                </div>
                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nama" class="form-control" value="{{ $student->nis }}" required>
                </div>
                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="kelas" class="form-control" value="{{ $student->nama }}" required>
                </div>
                <div class="mb-3">
                    <label>Kelas</label>
                    <input type="number" name="jumlah" class="form-control" value="{{ $student->kelas }}" required>
                </div>
                <div class="mb-3">
                    <label>Jenis Kelamin</label>
                    <select name="jk" class="form-control" required>
                        <option value="L" {{ $student->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="P" {{ $student->jenis_kelamin == 'P' ? 'selected' : ''  }}>Perempuan</option>
                    </select>
                </div>
            


                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
    <!-- End of Page Wrapper -->

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
     

</body>

</html> 