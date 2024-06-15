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
                <h3>Admin Dashboard</h3>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldUser1"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                                <h6 class="text-muted font-semibold">Jumlah Pengguna</h6>
                                                <h6 class="font-extrabold mb-0">{{ $jmlhPengguna }}</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldPlus"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                                <h6 class="text-muted font-semibold">Total Pemasukan</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBuy"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                                <h6 class="text-muted font-semibold">Total Pengeluaran</h6>
                                                <h6 class="font-extrabold mb-0">
                                                    Rp{{ number_format($totalPengeluaran, 0, ',', '.') }}</h6>
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
                                                class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldTime-Square"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                                <h6 class="text-muted font-semibold">Update Status Pengguna</h6>
                                                <h6 class="font-extrabold mb-0">{{ $updateStatus }}</h6>
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
                                        <h4>Status Pengguna Terbaru</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-hover table-lg">
                                                <thead>
                                                    <tr>
                                                        <th>Nama</th>
                                                        <th>Status</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($userUpdate as $user)
                                                        <tr>
                                                            <td class="col-3">
                                                                <div>
                                                                    <p class="font-bold mb-0">{{ $user->email }}</p>
                                                                </div>
                                                            </td>
                                                            <td class="col-auto">
                                                                @if ($user->roleId == 4)
                                                                    <h6 class="font-extrabold mb-0">Meminta Update Status
                                                                    </h6>
                                                                @elseif($user->roleId == 2)
                                                                    <h6 class="font-extrabold mb-0">Pengguna Baru</h6>
                                                                @endif
                                                                <p class="mb-0">
                                                                    @if ($user->updated_at)
                                                                        {{ $user->updated_at->translatedFormat('H:i - d M y') }}
                                                                    @else
                                                                        <span>No update date available</span>
                                                                    @endif
                                                                </p>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
                        <div class="card mb-3">
                            <div class="card-body px-2 py-5">
                                <div class="row">
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-center ">
                                        <div class="stats-icon purple mb-2">
                                            <i class="iconly-boldProfile"></i>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-7 text-center">
                                        <h5 class="font-bold">{{ $user = Auth::user()->name }}</h5>
                                        <h6 class="text-muted mb-0">{{ $user = Auth::user()->email }}</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header text-center">
                                <h5>Tipe Pengguna</h5>
                            </div>
                            <div class="card-body">
                                <div id="chart-userType"></div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header text-center">
                                <h4>Pengguna Baru</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <div id="chart-newUser"></div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var options = {
                chart: {
                    type: 'donut',
                    width: '100%',
                    height: '350px'
                },
                series: [{{ $premiumUser }}, {{ $freeUser }}],
                labels: ['Premium', 'Free'],
                colors: ['#198754', '#435ebe'],
                legend: {
                    position: 'bottom'
                },
                plotOptions: {
                    pie: {
                        donut: {
                            size: '30%'
                        }
                    }
                }
            };
            var chart = new ApexCharts(document.querySelector("#chart-userType"), options);
            chart.render();
        });
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var dates = @json($dates);
            var userCounts = @json($userCounts);

            var optionsNewUser = {
                series: [{
                    name: 'Pengguna Baru',
                    data: userCounts
                }],
                chart: {
                    height: 80,
                    type: 'area',
                    toolbar: {
                        show: false,
                    },
                },
                colors: ['#ffc434'],
                stroke: {
                    width: 2,
                },
                grid: {
                    show: false,
                },
                dataLabels: {
                    enabled: false
                },
                xaxis: {
                    type: 'datetime',
                    categories: dates,
                    axisBorder: {
                        show: false
                    },
                    axisTicks: {
                        show: false
                    },
                    labels: {
                        show: false,
                    }
                },
                show: false,
                yaxis: {
                    labels: {
                        show: false,
                        formatter: function(value) {
                            return Math.round(value);
                        },
                    },
                },
                tooltip: {
                    x: {
                        format: 'dd MMM yy'
                    },
                },
            };
            var chart = new ApexCharts(document.querySelector("#chart-newUser"), optionsNewUser);
            chart.render();
        });
    </script>
@endsection
