<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Duit Tracker</title>
    <link rel="icon" href="{{ asset('LandingPage/assets/images/icon-duittracker.svg') }}" type="icon-duittracker">
    <link rel="stylesheet" href="{{ asset('LandingPage/assets/libs/OwlCarousel-2/dist/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('LandingPage/dist/css/iconfont/tabler-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('LandingPage/dist/css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .navbar-brand img {
            max-height: 50px;
            /* Sesuaikan tinggi gambar logo */
        }

        .nav-toggler {
            padding-left: 10px;
            /* Jarak antara logo dan tombol */
        }

        /* Menyesuaikan ukuran logo pada layar kecil */
        @media (max-width: 576px) {
            .navbar-brand img {
                max-height: 30px;
                /* Perkecil logo pada layar kecil */
            }
        }
    </style>
</head>

<body>
    <!------------------------------>
    <!-- Header Start -->
    <!------------------------------>
    <header class="main-header position-fixed w-100">
        <div class="container">
            <nav class="navbar navbar-expand-xl py-0">
                <div class="container-fluid d-flex align-items-center">
                    <a class="navbar-brand py-0 me-0" href="/">
                        <img src="{{ asset('LandingPage/assets/images/DuidTracker.svg') }}" class="img-fluid"
                            alt="Logo">
                    </a>
                    <a class="nav-toggler text-decoration-none d-xl-none" data-bs-toggle="offcanvas"
                        href="#offcanvasExample" aria-controls="offcanvasExample">
                        <i class="ti ti-menu-2 text-warning"></i>
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto">
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" href="#services">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" aria-current="page" href="#about">Tentang</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" href="#price">Harga</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" href="#faq">Pertanyaan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-capitalize" href="#contact">Kontak</a>
                            </li>
                        </ul>
                        <div class="d-flex align-items-center">
                            <a class="btn btn-warning btn-hover-secondery text-capitalize" href="/login">Login</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>

        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample"
            aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-body pt-0">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="#services">Layanan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" aria-current="page" href="#about">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="#price">Harga</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="#faq">Pertanyaan</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-capitalize" href="#contact">Kontak</a>
                    </li>
                </ul>
                <div class="login d-block align-items-center mt-3">
                    <a class="btn btn-warning text-capitalize w-100" href="login">Login</a>
                </div>
            </div>
        </div>
    </header>
    <!------------------------------>
    <!-- Header End  -->
    <!------------------------------>

    <!------------------------------>
    <!--- Hero Banner Start--------->
    <!------------------------------>
    <section id="main" class="hero-banner position-relative overflow-hidden">
        <div class="container">
            <div class="row d-flex flex-wrap align-items-center">
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="position-relative left-hero-color">
                        <h1 class="mb-0 fw-bold">
                            Kelola Keuangan dengan Mudah dan Efektif
                        </h1>
                        <p>Duit Tracker mencatat, memantau, dan menganalisis transaksi keuangan.</p>
                        <a href="register" class="btn btn-warning btn-hover-secondery">Mulai Sekarang
                        </a>
                    </div>
                </div>
                <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                    <div class="position-relative right-hero-color">
                        <img src="{{ asset('LandingPage/assets/images/hero/right-image.svg') }}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------>
    <!--- Hero Banner End--------->
    <!------------------------------>

    <!------------------------------>
    <!--- Service sectin Start------>
    <!------------------------------>
    <section id="services" class="service position-relative overflow-hidden">
        <div class="container position-relative">
            <img src="{{ asset('LandingPage/assets/images/service/dot-shape.png') }}" class="shape position-absolute">
            <div class="row">
                <div class="col-12"><small class="fs-7 d-block">Layanan Kami</small></div>
                <div
                    class="col-12 d-xxl-flex d-xl-flex d-lg-flex d-md-flex d-sm-block d-block align-items-center justify-content-xxl-between justify-content-xl-between justify-content-lg-between justify-content-md-between justify-content-sm-between justify-content-sm-center ">
                    <h2 class="fs-2 text-black mb-0">Layananan yang <br> Kami Berikan</h2>

                </div>
            </div>
            <div class="row d-flex flex-wrap justify-content-center step-row">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="icon-round overflow-hidden rounded-circle position-relative d-flex align-items-center justify-content-center mx-auto text-center">
                                <i class="ti ti-file-invoice  text-primary position-relative"></i>
                            </div>

                            <h3 class="fs-4">Pencatatan Transaksi</h3>
                            <p class="fs-7 mb-0 fw-500">Catat semua transaksi keuangan Anda dengan cepat dan mudah,
                                baik pemasukan maupun pengeluaran.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="icon-round overflow-hidden rounded-circle position-relative d-flex align-items-center justify-content-center mx-auto text-center">
                                <i class="ti ti-report text-primary position-relative"></i>
                            </div>

                            <h3 class="fs-4">Laporan Keuangan</h3>
                            <p class="fs-7 mb-0 fw-500">Dapatkan laporan keuangan yang komprehensif untuk membantu Anda
                                menganalisis kesehatan finansial Anda.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="icon-round overflow-hidden rounded-circle position-relative d-flex align-items-center justify-content-center mx-auto text-center">
                                <i class="ti ti-bell text-primary position-relative"></i>
                            </div>

                            <h3 class="fs-4">Pengingat Pembayaran</h3>
                            <p class="fs-7 mb-0 fw-500">Atur pengingat pembayaran untuk tagihan dan kewajiban lainnya,
                                sehingga Anda tidak pernah melewatkan tenggat waktu.</p>
                        </div>
                    </div>
                </div>
                <div class="w-100 my-2"></div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="icon-round overflow-hidden rounded-circle position-relative d-flex align-items-center justify-content-center mx-auto text-center">
                                <i class="ti ti-category text-primary position-relative"></i>
                            </div>

                            <h3 class="fs-4">Kategori Transaksi</h3>
                            <p class="fs-7 mb-0 fw-500">Kelompokkan transaksi berdasarkan kategori untuk memudahkan
                                pelacakan dan analisis pengeluaran.</p>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 text-center">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            <div
                                class="icon-round overflow-hidden rounded-circle position-relative d-flex align-items-center justify-content-center mx-auto text-center">
                                <i class="ti ti-file-spreadsheet text-primary position-relative"></i>
                            </div>

                            <h3 class="fs-4">Export Excel</h3>
                            <p class="fs-7 mb-0 fw-500">Laporan keuangan bisa di jadikan format excel berdasarkan
                                antara tangggal yang dipilih.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------>
    <!--- Service sectin Start------>
    <!------------------------------>

    <!---------------------------------->
    <!--- Our Service sectin Start------>
    <!---------------------------------->
    <section id="about" class="our-service position-relative overflow-hidden">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <img src="{{ asset('LandingPage/assets/images/our-service/our-service.svg') }}" class="img-fluid">
                </div>
                <div
                    class="col-xxl-4 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 ps-xxl-0 ps-xl-0 ps-lg-3 ps-md-3 ps-sm-3 ps-3">
                    <small class="fs-7 d-block">Tentang Kami</small>
                    <h2 class="fs-2 text-black mb-0">Duit Tracker</h2>
                    <p class="mb-0 fw-500 fs-7">
                        Duit Tracker adalah aplikasi keuangan berbasis web yang dirancang khusus untuk mempermudah Anda
                        dalam mengelola keuangan.
                        Kami memahami pentingnya pengelolaan keuangan yang efisien, dan dengan fitur-fitur kami yang
                        intuitif dan lengkap, Anda dapat mengatur pengeluaran,
                        melacak pendapatan, dan merencanakan keuangan masa depan dengan lebih baik.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------>
    <!--- Our Service sectin End---->
    <!------------------------------>

    <!------------------------------>
    <!-- Pricing section Start------>
    <!------------------------------>
    <section id="price" class="pricing position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-xxl-6 col-xl-6 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                    <small class="fs-7 d-block">Paket Harga</small>
                    <h2 class="fs-3 pricing-head text-black mb-0 position-relative">Paket yang Kami Sediakan</h2>
                </div>
            </div>
            <div class="row justify-content-center price-plan">
                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card position-relative shadow border-0 h-100">
                        <div class="card-body pb-4">
                            <small class="fs-7 d-block text-warning text-center">Gratis</small>
                            <h2 class="mb-4 text-center position-relative"><sub class="fs-2 text-black">Rp 0</sub>
                            </h2>
                            <p class="fs-7 text-center fw-500">Paket ini cocok untuk individu yang membutuhkan solusi
                                CRM sederhana dengan maksimal 5 kali penggunaan fitur layanan.</p>
                            <ul class="list-unstyled mb-0 pl-0">
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Laporan Keuangan</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Export Excel</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Reset Password</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-alert-circle fs-4 pe-2 text-warning"></i>
                                    <span class="fs-7 text-black">Maksimal 5 Pencatatan Keuangan</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-action text-center pb-xxl-5 pb-xl-5 pb-lg-5 pb-md-4 pb-sm-4 pb-4">
                            <a href="/register" class="btn btn-warning btn-hover-secondery text-capitalize">Mulai
                                Sekarang</a>
                        </div>
                    </div>
                </div>

                <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                    <div class="card position-relative shadow border-0 h-100">

                        <div class="card-body pb-4">
                            <small class="fs-7 d-block text-warning text-center">Bisnis</small>
                            <h2 class="mb-4 text-center position-relative"><sub class="fs-2 text-black">Rp 49k</sub>
                            </h2>
                            <p class="fs-7 text-center fw-500">Paket ini cocok untuk bisnis yang membutuhkan solusi CRM
                                komprehensif dengan pencatatan keuangan tanpa batasan.</p>
                            <ul class="list-unstyled mb-0 pl-0">
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Laporan Keuangan</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Export Dokumen</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Reset Password</span>
                                </li>
                                <li class="d-flex align-items-start">
                                    <i class="ti ti-circle-check fs-4 pe-2"></i>
                                    <span class="fs-7 text-black">Tidak Ada Batasan Pencatatan Keuangan</span>
                                </li>
                            </ul>
                        </div>
                        <div class="card-action text-center pb-xxl-5 pb-xl-5 pb-lg-5 pb-md-4 pb-sm-4 pb-4">
                            <a href="/register" class="btn btn-warning btn-hover-secondery text-capitalize">Mulai
                                Sekarang</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!------------------------------>
    <!-- Pricing section End-------->


    <!------------------------------>
    <!------ FAQ section Start------>
    <!------------------------------>
    <section id="faq" class="faq position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-12 text-center">
                    <small class="fs-7 d-block">Pertanyaan yang Sering Diajukan</small>
                    <h2 class="fs-3 text-black mb-0">Ingin menanyakan sesuatu dari kami?</h2>
                </div>
            </div>
            <div class="accordion-block">
                <div class="accordion row" id="accordionPanelsStayOpenExample">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                                <button class="accordion-button text-black fs-7" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne"
                                    aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                                    Apa itu Duit Tracker ?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show"
                                aria-labelledby="panelsStayOpen-headingOne">
                                <div class="accordion-body fs-7 fw-500 pt-0">
                                    Duit Tracker Duit Tracker adalah aplikasi keuangan berbasis web yang membantu Anda
                                    dalam mencatat, memantau, dan menganalisis transaksi keuangan dengan cepat dan
                                    akurat. Aplikasi ini dirancang untuk memudahkan pengelolaan keuangan pribadi Anda.
                                    adalah aplikasi keuangan berbasis web yang membantu Anda dalam mencatat, memantau,
                                    dan menganalisis transaksi keuangan dengan cepat dan akurat. Aplikasi ini dirancang
                                    untuk memudahkan pengelolaan keuangan pribadi Anda.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                                <button class="accordion-button collapsed text-black fs-7" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                                    Bagaimana cara mencatat transaksi di Duit Tracker?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingTwo">
                                <div class="accordion-body fs-7 fw-500 pt-0">
                                    Anda dapat mencatat transaksi dengan mudah melalui fitur pencatatan transaksi di
                                    aplikasi. Cukup masukkan detail transaksi seperti jumlah, kategori, dan tanggal,
                                    lalu simpan. Semua data akan tersimpan dengan aman dan dapat diakses kapan saja.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                                <button class="accordion-button collapsed text-black fs-7" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                                    Apakah Duit Tracker menyediakan laporan keuangan?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingThree">
                                <div class="accordion-body fs-7 fw-500 pt-0">
                                    Ya, Duit Tracker menyediakan laporan keuangan yang komprehensif. Anda bisa melihat
                                    laporan bulanan, tahunan, atau berdasarkan kategori tertentu untuk membantu Anda
                                    menganalisis kesehatan keuangan Anda.
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="panelsStayOpen-headingfour">
                                <button class="accordion-button collapsed text-black fs-7" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefour"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapsefour">
                                    Bagaimana cara mengatur pengingat pembayaran?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapsefour" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingfour">
                                <div class="accordion-body fs-7 fw-500 pt-0">
                                    Anda dapat mengatur pengingat pembayaran melalui fitur pengingat di aplikasi. Cukup
                                    masukkan detail pembayaran seperti jumlah, tanggal jatuh tempo, dan deskripsi, lalu
                                    atur pengingat agar Anda mendapatkan notifikasi sebelum tanggal pembayaran.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="panelsStayOpen-headingfive">
                                <button class="accordion-button collapsed text-black fs-7" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsefive"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapsefive">
                                    Apakah Duit Tracker aman digunakan?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapsefive" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingfour">
                                <div class="accordion-body fs-7 fw-500 pt-0">
                                    Keamanan data pengguna adalah prioritas utama kami. Duit Tracker menggunakan
                                    teknologi enkripsi terbaru untuk memastikan bahwa semua data transaksi dan informasi
                                    pribadi Anda aman dari akses yang tidak sah.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item mb-3">
                            <h2 class="accordion-header" id="panelsStayOpen-headingsix">
                                <button class="accordion-button collapsed text-black fs-7" type="button"
                                    data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapsesix"
                                    aria-expanded="false" aria-controls="panelsStayOpen-collapsesix">
                                    Apakah saya bisa mengelompokkan transaksi berdasarkan kategori?
                                </button>
                            </h2>
                            <div id="panelsStayOpen-collapsesix" class="accordion-collapse collapse"
                                aria-labelledby="panelsStayOpen-headingsix">
                                <div class="accordion-body fs-7 fw-500 pt-0">
                                    Ya, Anda dapat mengelompokkan transaksi berdasarkan kategori di Duit Tracker. Fitur
                                    ini membantu Anda memantau pengeluaran dan pemasukan dengan lebih teratur, sehingga
                                    Anda dapat mengelola keuangan dengan lebih baik.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!------------------------------>
    <!------ FAQ section End------>
    <!------------------------------>

    <!------------------------------>
    <!-----Contact section Start---->
    <!------------------------------>
    <section id="contact" class="contact bg-primary position-relative overflow-hidden">
        <div class="container position-relative">
            <div class="dots-shape-left position-absolute"><img
                    src="{{ asset('LandingPage/assets/images/icons/dot-shape.png') }}"></div>
            <div class="dots-shape-right position-absolute"><img
                    src="{{ asset('LandingPage/assets/images/icons/dot-shape.png') }}"></div>
            <div class="row">
                <div class="col-xxl-5 col-xl-5 col-lg-5 col-md-12 col-sm-12 col-12">
                    <small class="fs-7 d-block text-warning">Bergabung dengan Kami</small>
                    <h2 class="fs-3 text-white mb-0">Ingin Mengajukan Pertanyaan?</h2>
                </div>
                <div class="col-xxl-7 col-xl-7 col-lg-7 col-md-12 col-sm-12 col-12">
                    <form class="position-relative" action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="row ps-xxl-5 ps-xl-5 ps-lg-3 ps-md-0 ps-sm-0 ps-0">
                            <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="form-group">
                                    <label class="form-label text-white fs-7 mb-3">Nama</label>
                                    <input type="text" class="form-control border-0"
                                        placeholder="Masukkan nama Anda" name="nama" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label text-white fs-7 mb-3">Email</label>
                                    <input type="email" class="form-control border-0"
                                        placeholder="Masukkan email Anda" name="email" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label text-white fs-7 mb-3">No Hp</label>
                                    <input type="text" class="form-control border-0"
                                        placeholder="Masukkan nomor HP Anda" name="no_hp" required>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="form-group">
                                    <label class="form-label text-white fs-7 mb-3">Pesan pertanyaan</label>
                                    <textarea class="form-control border-0" placeholder="Masukkan pesan pertanyaan Anda" name="pesan" required></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-warning btn-hover-secondery text-capitalize mt-2  contact-btn"
                                    type="submit">Ajukan Pertanyaan</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
    </section>
    <!------------------------------>
    <!-----Contact section End----->
    <!------------------------------>

    <!------------------------------>
    <!-----Footer Start------------->
    <!------------------------------>
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="copyrights text-center blue-light  fw-500">@<span id="autodate">2024</span> - Duit Tracker
            </div>
    </footer>
    <!------------------------------>
    <!-------Footer End------------->
    <!------------------------------>


    <script src="{{ asset('LandingPage/dist/js/jquery.min.js') }}"></script>
    <script src="{{ asset('LandingPage/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('LandingPage/assets/libs/OwlCarousel-2/dist/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('LandingPage/dist/js/custom.js') }}"></script>

</body>

</html>