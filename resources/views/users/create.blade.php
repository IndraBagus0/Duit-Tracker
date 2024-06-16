@extends('layouts.main')

@section('contents')
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <div class="page-title">
                    <div class="row align-items-center">
                        <div class="col-12 col-md-6">
                            <h3>Tambahkan Pengguna</h3>
                            <p class="text-subtitle text-muted">Berikut adalah fitur tambah pengguna.</p>
                        </div>
                        <div class="col-12 col-md-6 mt-md-0">
                            <div class="text-md-end mb-3 mb-md-0">
                                <a href="/users" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i>
                                    Kembali</a>
                            </div>
                        </div>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>

            <section class="section">
                <div class="card">
                    <div class="card-body">
                        <form class="form" action="{{ route('storeUser') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group mandatory">
                                        <label for="name" class="form-label">Nama Lengkap</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Masukkan nama lengkap" data-parsley-required="true">
                                    </div>

                                    <div class="form-group mandatory">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan email" data-parsley-required="true">
                                    </div>

                                    <div class="form-group mandatory">
                                        <label for="phone" class="form-label">No HP</label>
                                        <input type="text" class="form-control" id="phoneNumber" name="phoneNumber"
                                            placeholder="Masukkan nomor HP" data-parsley-required="true">
                                    </div>

                                    <div class="form-group mandatory">
                                        <label for="saldo" class="form-label">Saldo</label>
                                        <input type="text" class="form-control" id="nominal-id-icon"
                                            placeholder="Masukkan nominal saldo" data-parsley-required="true">
                                        <input type="hidden" id="accountBalance" name="accountBalance">
                                    </div>

                                    <div class="form-group mandatory">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan password" data-parsley-required="true">
                                    </div>

                                    <div class="form-group text-end mt-3 mb-0">
                                        <button type="submit" class="btn btn-primary me-2">Simpan</button>
                                        <button type="reset" class="btn btn-secondary">Reset</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

            @include('layouts.footer')
        </div>
        <script>
            var saldo = document.getElementById('nominal-id-icon');
            var accountBalance = document.getElementById('accountBalance');

            saldo.addEventListener('input', function(e) {
                // Remove formatting to get plain number
                var plainNumber = removeNonNumeric(this.value);
                // Update the hidden input with the plain number
                accountBalance.value = plainNumber;
                // Format the value and update the visible input
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

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? prefix + rupiah : '');
            }
        </script>
    </div>
@endsection
