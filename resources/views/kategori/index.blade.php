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
                    <h3>Daftar Kategori</h3>
                    <p class="text-subtitle text-muted">Berikut adalah daftar kategori.</p>
                </div>
                <div class="col-12 col-md-6 mt-md-0">
                    <div class="text-md-end mb-3 mb-md-0">
                        <a href="{{ route('createKategori') }}" class="btn btn-primary">Tambahkan Data</a>
                    </div>
            </div>
            </div>

        <!-- Menampilkan tabel -->
        <section class="section">
            <div class="row" id="table-bordered">
                <div class="col-12">
                    <div class="card">
                        <div class="card-content">
                            
                            <!-- table bordered -->
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>KATEGORI</th>
                                            <th>KETERANGAN</th>
                                            <th>ACTION</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($kategori as $kategori)
                                    <tr>
                                        <td class="text-bold-500">{{ $loop->index + 1 }}</td>
                                        <td>{{ $kategori->nama_kategori }}</td>
                                        <td class="text-bold-500">{{ $kategori->keterangan_kategori }}</td>
                                        <td>
                                            <a href="{{route('editKategori', ['id_kategori' => $kategori->id_kategori])}}"><i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="edit"></i></a>
                                        
                                            <a href="{{ route('deleteKategori', ['id_kategori' => $kategori->id_kategori]) }}" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"><i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash-2"></i></a>
                                    </div>
                                        
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
        </section>
        <!-- Bordered table end -->

        @include('layouts.footer')
        
    </div>
</div>
@endsection