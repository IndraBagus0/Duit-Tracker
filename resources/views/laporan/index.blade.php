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
                        <h3>Laporan Transaksi</h3>
                        <p class="text-subtitle text-muted">Berikut adalah laporan transaksi berdasarkan kategori.</p>
                    </div>
                    <div class="col-12 col-md-6 mt-md-0">
                        <div class="text-md-end mb-3 mb-md-0">
                            <form method="GET" action="{{ route('laporan.index') }}" class="form-inline">
                                <div class="input-group">
                                    <input type="date" name="start_date" class="form-control" value="{{ $startDate }}">
                                    <input type="date" name="end_date" class="form-control" value="{{ $endDate }}">
                                    <button type="submit" class="btn btn-primary">Filter</button>
                                    <a href="{{ route('laporan.print', ['start_date' => $startDate, 'end_date' => $endDate]) }}" class="btn btn-secondary" target="_blank">Print</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <section class="section">
                <div class="row" id="table-bordered">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="table-responsive">
                                    <table class="table table-bordered mb-0">
                                        <thead>
                                            <tr>
                                                <th>NO</th>
                                                <th>TANGGAL</th>
                                                <th>KATEGORI</th>
                                                <th>NOMINAL</th>
                                                <th>CATATAN</th>
                                                <th>JENIS</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($transaksi as $index => $trx)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td>{{ $trx->tanggal_transaksi}}</td>
                                            <td>{{ $trx->kategori->nama_kategori }}</td>
                                            <td>{{ number_format($trx->nominal_transaksi, 2) }}</td>
                                            <td>{{ $trx->catatan_transaksi }}</td>
                                            <td>{{ $trx->jenis_transaksi }}</td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
    @include('layouts.footer')
</div>
@endsection
