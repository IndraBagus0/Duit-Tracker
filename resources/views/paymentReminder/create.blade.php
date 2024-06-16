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
                            <h3>Tambah Pengingat Pembayaran</h3>
                            <p class="text-subtitle text-muted">Berikut adalah fitur tambah pengingat pembayaran.</p>
                        </div>
                        <div class="col-12 col-md-6 mt-md-0">
                            <div class="text-md-end mb-3 mb-md-0">
                                <a href="/pengingat-pembayaran" class="btn btn-primary"><i
                                        class="bi bi-arrow-left-circle"></i> Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible show fade" role="alert">
                                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <form action="{{ route('paymentReminder.store') }}" method="POST">
                            @csrf
                            <div class="form-group has-icon-left">
                                <label for="reminder-date">Tanggal Pengingat</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control flatpickr-no-config flatpickr-input"
                                        name="reminderDate" placeholder="Pilih Tanggal" id="reminder-date" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="nominal-id">Nominal</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="nominal" placeholder="Masukan Nominal"
                                        id="nominal-id" required>
                                    <input type="hidden" id="nominal" name="nominal">
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash-coin"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="note-id">Catatan</label>
                                <div class="position-relative">
                                    <textarea id="note-id" name="description" class="form-control" placeholder="Masukan Catatan (tidak wajib)" required></textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </section>
            </div>

            @include('layouts.footer')
        </div>
        <script>
            var saldo = document.getElementById('nominal-id');
            var nominal = document.getElementById('nominal');

            saldo.addEventListener('input', function(e) {
                // Remove formatting to get plain number
                var plainNumber = removeNonNumeric(this.value);
                // Update the hidden input with the plain number
                nominal.value = plainNumber;
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
