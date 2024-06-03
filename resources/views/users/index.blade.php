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
                        <h3>Daftar Pengguna</h3>
                        <p class="text-subtitle text-muted">Berikut adalah daftar pengguna.</p>
                    </div>
                    <div class="col-12 col-md-6 mt-md-0">
                        <div class="text-md-end mb-3 mb-md-0">
                            <a href="{{ route('createUser') }}" class="btn btn-primary">Tambahkan Data</a>
                        </div>
                    </div>
                </div>

                @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible show fade" role="alert">
                    <i class="bi bi-check-circle"></i> {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
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
                                                <th>NAMA LENGKAP</th>
                                                <th>EMAIL</th>
                                                <th>NO HP</th>
                                                <th>SALDO</th>
                                                <th>ROLE</th>
                                                <th>ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td class="text-bold-500">{{ $loop->index + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td class="text-bold-500">{{ $user->email }}</td>
                                                <td class="text-bold-500">{{ $user->no_hp }}</td>
                                                <td class="text-bold-500">{{ 'Rp ' . number_format($user->saldo, 0, ',', '.') }}</td>
                                                <td class="text-bold-500">
                                                    @if($user->id_role == 1)
                                                    Admin
                                                    @elseif($user->id_role == 2)
                                                    User
                                                    @elseif($user->id_role == 3)
                                                    Premium
                                                    @endif
                                                </td>
                                                <td>
                                                    <a href="{{ route('editUser', ['id' => $user->id]) }}"><i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="edit"></i></a>
                                                    <a href="#" onclick="deleteConfirmation(event, {{ $user->id }})"><i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="trash-2"></i></a>
                                                    <form id="delete-form-{{ $user->id }}" action="{{ route('deleteUser', ['id' => $user->id]) }}" method="POST" style="display: none;">
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
            <!-- Bordered table end -->

            @include('layouts.footer')

        </div>
    </div>
</div>

<script>
    function deleteConfirmation(event, id) {
        event.preventDefault();
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

@endsection
