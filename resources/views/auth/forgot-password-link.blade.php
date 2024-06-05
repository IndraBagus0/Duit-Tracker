@extends('layouts.main')

@section('contents')
<body>
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('template/assets/images/logo/logo.svg')}}" alt="Logo"></a>
                    </div>
                    <h4 class="auth-title">Reset Password Untuk .</h4>
                    <p class="auth-subtitle mb-5">Masukkan password baru kamu.</p>

                    <form action="{{ route('reset-password-action') }}" method="post">
                        @csrf
                        <input type="hidden" name="token" value="{{ $token }}">
                        
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Kata Sandi Baru">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password_confirmation" id="password_confirmation" class="form-control form-control-xl" placeholder="Konfirmasi Kata Sandi Baru">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div id="password-match-status" class="mt-1"></div>
                        </div>

                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Reset Password</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah ingat password? <a href="{{ route('login') }}" class="font-bold">Masuk</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                </div>
            </div>
        </div>
    </div>
   
    <script>
        var password = document.getElementById('password');
        var passwordConfirmation = document.getElementById('password_confirmation');
        var passwordMatchStatus = document.getElementById('password-match-status');

        function checkPasswordMatch() {
            if (password.value === passwordConfirmation.value) {
                passwordMatchStatus.innerHTML = '<span class="text-success">Password match</span>';
            } else {
                passwordMatchStatus.innerHTML = '<span class="text-danger">Password does not match</span>';
            }
        }

        password.addEventListener('keyup', checkPasswordMatch);
        passwordConfirmation.addEventListener('keyup', checkPasswordMatch);

        @if(session('success'))
        Swal.fire({
            title: "Good job!",
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
