@extends('layouts.main')

@section('contents')
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="/p"><img src="{{ asset('template/assets/images/logo/logo.svg') }}" alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Lupa Kata Sandi</h1>
                    <p class="auth-subtitle mb-5">Masukkan E-Mail kamu yang sudah terdaftar.</p>
                    <form action="{{ route('forgot-password-action') }}" method="POST">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        @error('email')
                        <small>{{ $message }}</small>
                        @enderror
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Konfirmasi</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Ingat Kata Sandi? <a href="/login" class="font-bold">Masuk</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

    <!-- Include SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <script>
        @if(session('success'))
        Swal.fire({
            title: "Success!",
            text: "{{ session('success') }}",
            icon: "success"
        });
        @endif

        @if(session('error'))
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "{{ session('error') }}",
        });
        @endif
    </script>
</body>
@endsection
