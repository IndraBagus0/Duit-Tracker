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
                <h3>Statistik Pengguna</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldWallet"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Total Saldo</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    Rp{{ number_format($totalSaldo, 0, ',', '.') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldPlus"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pemasukan</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    Rp{{ number_format($totalPemasukan, 0, ',', '.') }}</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBuy"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Pengeluaran</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-4 py-4-5">
                                        <div class="row">
                                            <div
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldCalendar"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Tunggakan</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    Rp{{ number_format($totalTunggakan, 0, ',', '.') }}
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Rekap Bulan {{ $bulanSaatIni }}</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-rekap-bulanan"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="row">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                            <h6 class="font-bold">{{ $user = Auth::user()->name }}</h6>
                                            <h6 class="text-muted mb-0">{{ $user = Auth::user()->email }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="card">
                                <div class="card-header">
                                    <h4>Riwayat Transaksi</h4>
                                </div>
                                <div class="card-content">
                                    <!-- Tampilkan riwayat transaksi terbaru -->
                                    @foreach ($recentTransactions as $transaction)
                                        <div class="recent-message d-flex px-4 py-3">
                                            <div class="col-md-4 d-flex justify-content-start ">
                                                <div
                                                    class="stats-icon {{ $transaction->transactionType == 'Pemasukan' ? 'green' : 'red' }} mb-2">
                                                    <i
                                                        class="iconly-boldArrow---{{ $transaction->transactionType == 'Pemasukan' ? 'Up' : 'Down' }}-Circle"></i>
                                                </div>
                                            </div>
                                            <div class="name">
                                                <h5 class="mb-1">
                                                    Rp{{ number_format($transaction->transactionAmount, 0, ',', '.') }}</h5>
                                                <h6 class="text-muted mb-0">
                                                    {{ $transaction->transactionDate->format('d M y') }}
                                                </h6>
                                            </div>
                                        </div>
                                    @endforeach
                                    <div class="recent-message d-flex px-4 py-3">
                                        <div class="name ms-4">
                                            <h5 class="mb-1">Keterangan</h5>
                                            <div class="form-check form-check-success">
                                                <input class="form-check-input" type="radio"
                                                    style="background-color: #5ddab4; border-color:#5ddab4">
                                                <label class="form-check-label" for="Success">
                                                    <h6 class="text-muted mb-0">Pemasukan</h6>
                                                </label>
                                            </div>
                                            <div class="form-check form-check-danger">
                                                <input class="form-check-input" type="radio"
                                                    style="background-color: #ff7976; border-color:#ff7976">
                                                <label class="form-check-label" for="Danger">
                                                    <h6 class="text-muted mb-0">Pengeluaran</h6>
                                                </label>
                                            </div>
                                        </div>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Ambil data transaksi dari controller (Anda bisa menyesuaikan cara pengambilan data ini)
        const transactions = @json($transaksi); // Pastikan data ini tersedia dari backend

        // Siapkan data untuk chart
        const categories = [];
        const dataPemasukan = [];
        const dataPengeluaran = [];

        // Menginisialisasi objek untuk menyimpan pemasukan dan pengeluaran berdasarkan tanggal
        const transactionData = {};

        transactions.forEach(transaction => {
            const date = new Date(transaction.transactionDate).toLocaleDateString('id-ID', {
                day: '2-digit',
                month: 'short',
                year: '2-digit'
            });

            if (!transactionData[date]) {
                transactionData[date] = {
                    pemasukan: 0,
                    pengeluaran: 0
                };
            }

            if (transaction.transactionType === 'Pemasukan') {
                transactionData[date].pemasukan += transaction.transactionAmount;
            } else if (transaction.transactionType === 'Pengeluaran') {
                transactionData[date].pengeluaran += transaction.transactionAmount;
            }
        });

        for (const [date, amounts] of Object.entries(transactionData)) {
            categories.push(date);
            dataPemasukan.push(amounts.pemasukan);
            dataPengeluaran.push(amounts.pengeluaran);
        }

        var options = {
            chart: {
                type: 'bar'
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    dataLabels: {
                        position: 'top'
                    },
                    columnWidth: '45%', // Atur lebar kolom agar lebih rapat
                    endingShape: 'rounded'
                },
            },
            series: [{
                    name: 'Pemasukan',
                    data: dataPemasukan,
                    color: '#5DDAB4' // Warna hijau untuk pemasukan
                },
                {
                    name: 'Pengeluaran',
                    data: dataPengeluaran,
                    color: '#FF7976' // Warna merah untuk pengeluaran
                }
            ],
            xaxis: {
                categories: categories
            },
            legend: {
                show: false, // Menampilkan keterangan di bawah chart
            },
            dataLabels: {
                enabled: false, // Menampilkan keterangan angka dalam bar chart
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart-rekap-bulanan"), options);
        chart.render();
    });
</script>
