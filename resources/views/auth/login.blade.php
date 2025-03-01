<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Pengelolaan Pegawai</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('template/src/assets/images/logos/favicon.png') }}" />
  <link rel="stylesheet" href="{{ asset('template/src/assets/css/styles.min.css') }}" />
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <div
      class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href="{{ route('admin.login') }}" class="text-nowrap logo-img text-center d-block py-0 w-100">
                  {{-- <img src="{{ asset('template/src/assets/images/logos/dark-logo.svg') }}" width="180" alt="Logo"> --}}
                  <h2 class="fw-bolder">Sign in</h2>
                </a>
                <p class="text-center">Masuk sebagain admin</p>

                @if (session('error'))
                <div class="alert alert-danger" role="alert">
                    {{ session('error') }}
                </div>
                @endif

                <form action="{{route('admin.attempt')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Username</label>
                    <input type="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Masukkan Username Anda" name="username">
                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Password</label>
                    <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Masukkan Password Anda" name="password">
                  </div>
                  <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check">
                      <input class="form-check-input primary" type="checkbox" value="" id="flexCheckChecked" checked>
                      <label class="form-check-label text-dark fs-2" for="flexCheckChecked">
                        Remeber this Device
                      </label>
                    </div>
                    <a class="text-primary fw-bold fs-2" href="{{ route('admin.login') }}">Forgot Password ?</a>
                  </div>
                  <button type="submit" class="btn btn-primary w-100 fs-4 mb-4 rounded-2 d-flex align-item-center justify-content-center gap-1">
                    <i class="ti ti-login-2"></i>
                    Sign in
                  </button>
                  {{-- <div class="d-flex align-items-center justify-content-center">
                    <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                    <a class="text-primary fw-bold ms-2" href="./authentication-register.html">Create an account</a>
                  </div> --}}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('template/src/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('template/src/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

  @auth
  <script>
    window.location = "{{ route('admin.dashboard') }}";
  </script>
  @endauth
</body>

</html>