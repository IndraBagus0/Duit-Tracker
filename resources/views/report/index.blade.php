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
                            <p class="text-subtitle text-muted">Berikut adalah laporan transaksi berdasarkan Jenis Transaksi
                            </p>
                        </div>
                        <div class="col-12 col-md-6 mt-md-0">
                            <div class="text-md-end mb-3 mb-md-0">
                                <form method="GET" action="{{ route('laporan.index') }}" class="form-inline">
                                    <input type="date" name="date_range"
                                        class="form-control flatpickr-range mb-3 flatpickr-input active"
                                        placeholder="Pilih Rentang Tanggal...." readonly="readonly"
                                        value="{{ request('date_range') }}" data-date-format="j M Y"
                                        data-alt-format="j M Y">
                                    <div class="input-group">
                                        <select name="jenis_transaksi" class="form-control me-2">
                                            <option value="">Jenis Transaksi</option>
                                            <option value="Pemasukan"
                                                {{ $jenisTransaksi == 'Pemasukan' ? 'selected' : '' }}>Pemasukan</option>
                                            <option value="Pengeluaran"
                                                {{ $jenisTransaksi == 'Pengeluaran' ? 'selected' : '' }}>Pengeluaran
                                            </option>
                                        </select>
                                        <button type="submit" class="btn btn-primary me-2">Filter</button>
                                        <a href="{{ route('laporan.print', ['start_date' => $startDate, 'end_date' => $endDate, 'jenis_transaksi' => $jenisTransaksi]) }}"
                                            class="btn btn-secondary" target="_blank">Print</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible show fade" role="alert">
                        <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <br>
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
                                                        <td>{{ $trx->transactionDate->format('j M Y') }}</td>
                                                        <td>{{ $trx->kategori->categoryName }}</td>
                                                        <td>{{ number_format($trx->transactionAmount, 0, ',', '.') }}</td>
                                                        <td>{{ $trx->notesTransaction }}</td>
                                                        <td>{{ $trx->transactionType }}</td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="3">Saldo Awal</th>
                                                    <th colspan="3" class="text-end">
                                                        {{ number_format($saldoAwal, 0, ',', '.') }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Pemasukan</th>
                                                    <th colspan="3" class="text-end">
                                                        {{ number_format($totalPemasukan, 0, ',', '.') }}</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Pengeluaran</th>
                                                    @php
                                                        $formattedTotalPengeluaran = number_format(
                                                            $totalPengeluaran * -1,
                                                            0,
                                                            ',',
                                                            '.',
                                                        );
                                                    @endphp
                                                    <th colspan="3" class="text-end">{{ $formattedTotalPengeluaran }}
                                                    </th>
                                                </tr>
                                                <tr>
                                                    <th colspan="3">Saldo Akhir</th>
                                                    <th colspan="3" class="text-end">
                                                        {{ number_format($totalSaldo, 0, ',', '.') }}
                                                    </th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            @include('layouts.footer')
        </div>
    </div>
@endsection
