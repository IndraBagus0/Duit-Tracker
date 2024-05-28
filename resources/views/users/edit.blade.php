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
                        <h3>Edit Pengguna</h3>
                        <p class="text-subtitle text-muted">Berikut adalah fitur edit pengguna.</p>
                    </div>
                    <div class="col-12 col-md-6 mt-md-0">
                        <div class="text-md-end mb-3 mb-md-0">
                            <a href="/users" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('updateUser', ['id' => $user->id]) }}" method="POST">
                        @csrf

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}" placeholder="Masukkan nama lengkap" required>
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}" placeholder="Masukkan email" required>
                                </div>

                                <div class="form-group">
                                    <label for="phone">No HP</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->no_hp }}" placeholder="Masukkan nomor HP" required>
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password baru (opsional)">
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Konfirmasi password baru (opsional)">
                                </div>

                                <div class="form-group text-end mt-3 mb-0">
                                    <button type="submit" class="btn btn-primary me-2">Update</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>

        @include('layouts.footer')
    </div>
</div>
@endsection
