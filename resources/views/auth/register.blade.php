@extends('layouts.main')

@section('contents')
    <div id="auth">
        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                        <a href="index.html"><img src="{{ asset('LandingPage/assets/images/DuidTracker.svg') }}"
                                alt="Logo"></a>
                    </div>
                    <h1 class="auth-title">Buat Akun</h1>
                    <p class="auth-subtitle mb-5">Masukkan data dibawah dengan benar.</p>

                    <form action="{{ route('register.post') }}" method="post">
                        @csrf
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="name" class="form-control form-control-xl" placeholder="Nama"
                                value="{{ old('name') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email"
                                value="{{ old('email') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" id="password" class="form-control form-control-xl"
                                placeholder="Kata Sandi">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password_confirmation" id="password_confirmation"
                                class="form-control form-control-xl" placeholder="Konfirmasi Kata Sandi">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                            <div id="password-match-status" class="mt-1"></div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" name="phoneNumber" id="phoneNumber" class="form-control form-control-xl"
                                placeholder="No Telepon" value="{{ old('phoneNumber') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-telephone"></i>
                            </div>
                            @error('phoneNumber')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" id="nominal-id-icon" class="form-control form-control-xl"
                                placeholder="Jumlah Saldo" value="{{ old('accountBalance') }}">
                            <input type="hidden" id="accountBalance" name="accountBalance"
                                value="{{ old('accountBalance') }}">
                            <div class="form-control-icon">
                                <i class="bi bi-wallet"></i>
                            </div>
                            @error('accountBalance')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Buat Akun</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Sudah mempunyai akun ? <a href="{{ route('login') }}"
                                class="font-bold">Masuk</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right"></div>
            </div>
        </div>
    </div>

    <script>
        // JavaScript for form validation and formatting
        var saldo = document.getElementById('nominal-id-icon');
        var accountBalance = document.getElementById('accountBalance');

        saldo.addEventListener('input', function(e) {
            var plainNumber = removeNonNumeric(this.value);
            accountBalance.value = plainNumber;
            this.value = formatRupiah(plainNumber, 'Rp. ');
        });

        function removeNonNumeric(value) {
            return value.replace(/[^,\d]/g, '');
        }

        function formatRupiah(angka, prefix) {
            var number_string = angka.replace(/[^,\d]/g, '').toString(),
                split = number_string.split(','),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
            return prefix === undefined ? rupiah : (rupiah ? prefix + rupiah : '');
        }

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

        @if (session('success'))
            Swal.fire({
                title: "Selamat Bergabung !",
                text: "{{ session('success') }}",
                icon: "success"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('login') }}";
                }
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "{{ session('error') }}",
            });
        @endif
    </script>
@endsection
