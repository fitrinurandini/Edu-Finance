<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
  <section class="vh-100">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6">
        <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.svg"
          class="img-fluid" alt="Phone image">
      </div>
      @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

      <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
        <form action="" method="POST">
          @csrf
          <!-- Email input -->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="nis">Masukan NIP/NUPTK <span class="text-danger">*</span></label>
            <input type="number" name="nis" value="{{ old('nis') }}" id="nis" class="form-control form-control-lg" />
          </div>

          <!-- Password input -->
          <div data-mdb-input-init class="form-outline mb-4">
          <label class="form-label" for="form1Example23">Password <span class="text-danger">*</span></label>
            <input type="password" name="password" id="form1Example23" class="form-control form-control-lg" />
          </div>

          

          <!-- Submit button -->
          <div class="d-grid gap-2">
          <button type="submit" data-mdb-button-init data-mdb-ripple-init class="btn btn-primary btn-lg btn-block" id="login">Login</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</section>
</body>
</html>