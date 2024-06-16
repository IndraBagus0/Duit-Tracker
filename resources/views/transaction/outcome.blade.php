@extends('transaction.index')

@section('transaction-content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Transaksi</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                            <li class="breadcrumb-item">Data Transaksi</li>
                            <li class="breadcrumb-item active" aria-current="page">Pengeluaran</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible show fade" role="alert">
                <i class="bi bi-check-circle"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger alert-dismissible show fade" role="alert">
                <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title"><i class="bi bi-cash-coin"></i> Tambah Pengeluaran</h4>
                </div>
                <div class="card-body">
                    <form class="form form-vertical" action="{{ route('saveOutcome') }}" method="POST">
                        @csrf
                        <div class="form-body">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group has-icon-left mandatory">
                                        <label for="date-name-icon" class="form-label">Tanggal</label>
                                        <div class="position-relative">
                                            <input type="date" class="form-control flatpickr-no-config flatpickr-input"
                                                name="transactionDate" placeholder="Pilih Tanggal" id="date-name-icon"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-event"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left mandatory">
                                        <label for="nominal-id-icon" class="form-label">Nominal</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" placeholder="Masukan Nominal"
                                                id="nominal-id-icon" required>
                                            <input type="hidden" id="transactionAmount" name="transactionAmount">
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-coin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left mandatory">
                                        <label for="kategori-id-icon" class="form-label">Kategori</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="kategori-transaksi">Opsi</label>
                                            <select class="form-select" name="categoryId" id="kategori-transaksi" required>
                                                <option selected disabled>Pilih Kategori yang Tersedia...</option>
                                                @foreach ($kategori as $index => $item)
                                                    <option value="{{ $item->categoryId }}">
                                                        {{ $item->categoryName }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="note-id-icon">Catatan</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="notesTransaction"
                                                placeholder="Masukan Catatan (tidak wajib)" id="note-id-icon">
                                            <div class="form-control-icon">
                                                <i class="bi bi-card-text"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </div>
                        <input type="hidden" name="transactionType" value="Pengeluaran">
                        <input type="hidden" name="userId" value="{{ Auth::id() }}">
                    </form>
                </div>
            </div>
        </section>
        <script>
            var saldo = document.getElementById('nominal-id-icon');
            var transactionAmount = document.getElementById('transactionAmount');

            saldo.addEventListener('input', function(e) {
                // Remove formatting to get plain number
                var plainNumber = removeNonNumeric(this.value);
                // Update the hidden input with the plain number
                transactionAmount.value = plainNumber;
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
