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
                    <div class="row">
                        <div class="col-12 col-md-6 order-md-1 order-last">
                            <h3>Profil Saya</h3>
                        </div>
                        <div class="col-12 col-md-6 order-md-2 order-first">
                            <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                    <li class="breadcrumb-item">Profil Saya</li>
                                
                                </ol>
                            </nav>
                        </div>

                        
                </div>
                @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert">
                            <i class="bi bi-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

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

        <!-- Menampilkan profil -->
        <section class="section">
        <div class=" col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                        <form class="form form-vertical" method="POST" action="{{ route('profil.update') }}">
                            @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="first-name-icon">Nama Lengkap</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control"
                                                         value="{{ $user->name }}" id="first-name-icon" name="name">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-person"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">

                                            <div class="form-group has-icon-left">
                                                <label for="email-id-icon">Email</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="{{ $user->email }}"
                                                        id="email-id-icon" readonly>
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-envelope"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="mobile-id-icon">No. WhatsApp</label>
                                                <div class="position-relative">
                                                    <input type="text" class="form-control" value="{{ $user->no_hp }}"
                                                        id="mobile-id-icon" name="no_hp">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-phone"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="status-id-icon">Status</label>
                                                <div class="position-relative">
                                                    <span class="badge {{ $user->id_role == 2 ? 'bg-primary' : ($user->id_role == 3 ? 'bg-success' : 'bg-primary') }}">
                                                        {{ $user->id_role == 2 ? 'Free Member' : ($user->id_role == 3 ? 'Premium Member' : 'Free Member') }}
                                                    </span>
                                                    @if($user->id_role == 2)
                                                        <a href="{{ route('profil.upgrade') }}" class="badge bg-warning ms-2">Upgrade</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group has-icon-left">
                                                <label for="password-id-icon">Password (opsional)</label>
                                                <div class="position-relative">
                                                    <input type="password" class="form-control" placeholder="Password"
                                                        id="password-id-icon" name="password">
                                                    <div class="form-control-icon">
                                                        <i class="bi bi-lock"></i>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Bordered table end -->

        @include('layouts.footer')
        
    </div>
</div>
@endsection