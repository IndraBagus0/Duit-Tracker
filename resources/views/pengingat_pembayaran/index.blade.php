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
            <h3>Daftar Pengingat Pembayaran</h3>
        </div>
        
        <div class="page-content">
            <section class="row">
                <div class="col-12">
                    <a href="{{ route('pengingat_pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pengingat Pembayaran</a>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Tanggal Pengingat</th>
                                <th>Nominal</th>
                                <th>Deskripsi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pengingatPembayarans as $pengingat)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $pengingat->tanggal_pengingat }}</td>
                                    <td>{{ $pengingat->nominal }}</td>
                                    <td>{{ $pengingat->deskripsi }}</td>
                                    <td>{{ $pengingat->status }}</td>
                                    <td>
                                        <!-- Add actions like edit, delete here if needed -->
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>

        @include('layouts.footer')
    </div>
</div>
@endsection
