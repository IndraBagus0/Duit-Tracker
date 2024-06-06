@extends('transaksi.index')

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
                                    <div class="form-group has-icon-left">
                                        <label for="date-name-icon">Tanggal</label>
                                        <div class="position-relative">
                                            <input type="date" class="form-control flatpickr-no-config flatpickr-input"
                                                name="tanggal_transaksi" placeholder="Pilih Tanggal" id="date-name-icon"
                                                required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-calendar-event"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="nominal-id-icon">Nominal</label>
                                        <div class="position-relative">
                                            <input type="number" class="form-control" name="nominal_transaksi"
                                                placeholder="Masukan Nominal" id="nominal-id-icon" required>
                                            <div class="form-control-icon">
                                                <i class="bi bi-cash-coin"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="kategori-id-icon">Kategori</label>
                                        <div class="input-group mb-3">
                                            <label class="input-group-text" for="kategori-transaksi">Opsi</label>
                                            <select class="form-select" name="id_kategori" id="kategori-transaksi" required>
                                                <option selected disabled>Pilih Kategori yang Tersedia...</option>
                                                @foreach ($kategori as $index => $item)
                                                    <option value="{{ $item->id_kategori }}">
                                                        {{ $item->nama_kategori }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group has-icon-left">
                                        <label for="note-id-icon">Catatan</label>
                                        <div class="position-relative">
                                            <input type="text" class="form-control" name="catatan_transaksi"
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
                        <input type="hidden" name="jenis_transaksi" value="Pengeluaran">
                        <input type="hidden" name="id_user" value="{{ Auth::id() }}">
                    </form>
                </div>
            </div>
        </section>
    </div>
@endsection
