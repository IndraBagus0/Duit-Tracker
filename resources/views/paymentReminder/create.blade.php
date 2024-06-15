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
                <h3>Tambah Pengingat Pembayaran</h3>
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

                        <form action="{{ route('paymentReminder.store') }}" method="POST">
                            @csrf
                            <div class="form-group has-icon-left">
                                <label for="date-name-icon">Tanggal Pengingat</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control flatpickr-no-config flatpickr-input"
                                        name="reminderDate" placeholder="Pilih Tanggal" id="date-name-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="nominal-id-icon">Nominal</label>
                                <div class="position-relative">
                                    <input type="text" class="form-control" name="nominal" placeholder="Masukan Nominal"
                                        id="nominal-id-icon" required>
                                    <input type="hidden" id="nominal" name="nominal">
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash-coin"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="note-id-icon">Catatan</label>
                                <div class="position-relative">
                                    <textarea id="deskripsi" name="description" class="form-control" placeholder="Masukan Catatan (tidak wajib)"></textarea>
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
            var saldo = document.getElementById('nominal-id-icon');
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
