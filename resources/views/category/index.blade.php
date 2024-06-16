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

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible show fade" role="alert">
                                <i class="bi bi-check-circle"></i> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

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
                                                    @foreach ($kategori as $index => $item)
                                                        <tr>
                                                            <td class="text-bold-500">{{ $index + 1 }}</td>
                                                            <td>{{ $item->categoryName }}</td>
                                                            <td class="text-bold-500">{{ $item->descriptionCategory }}</td>
                                                            <td>
                                                                <a
                                                                    href="{{ route('editKategori', ['id_kategori' => $item->categoryId]) }}">
                                                                    <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                                        data-feather="edit"></i>
                                                                </a>

                                                                <a href="#"
                                                                    onclick="deleteConfirmation({{ $item->categoryId }})">
                                                                    <i class="badge-circle badge-circle-light-secondary font-medium-1"
                                                                        data-feather="trash-2"></i>
                                                                </a>

                                                                <form id="delete-form-{{ $item->categoryId }}"
                                                                    action="{{ route('deleteKategori', ['id_kategori' => $item->categoryId]) }}"
                                                                    method="POST" style="display: none;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                </form>
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


                    <script>
                        function deleteConfirmation(id) {
                            Swal.fire({
                                title: 'Apakah Anda yakin?',
                                text: "Anda tidak akan dapat mengembalikan data ini!",
                                icon: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'Ya, hapus!',
                                cancelButtonText: 'Batal'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    document.getElementById('delete-form-' + id).submit();
                                }
                            });
                        }
                    </script>

                    <!-- Bordered table end -->

                    @include('layouts.footer')

                </div>
            </div>
        @endsection
