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
            <section class="row" id="table-bordered">
                <div class="col-12">
                    <a href="{{ route('pengingat_pembayaran.create') }}" class="btn btn-primary mb-3">Tambah Pengingat Pembayaran</a>
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-content">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
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
                                            <td>{{ \Carbon\Carbon::parse($pengingat->tanggal_pengingat)->format('d-m-Y') }}</td>
                                            <td>{{ number_format($pengingat->nominal, 0, ',', '.') }}</td>
                                            <td>{{ $pengingat->deskripsi }}</td>
                                            <td>
                                                @if($pengingat->status == 'paid')
                                                    <span class="badge bg-success">{{ $pengingat->status }}</span>
                                                @else
                                                    <span class="badge bg-warning">{{ $pengingat->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if($pengingat->status == 'unpaid')
                                                <form action="{{ route('pengingat_pembayaran.markAsPaid', ['id' => $pengingat->id_notif]) }}" method="POST" id="markAsPaidForm-{{ $pengingat->id_notif }}" style="display:inline;">
                                                    @csrf
                                                    <button type="button" class="btn btn-sm btn-primary" onclick="confirmMarkAsPaid({{ $pengingat->id_notif }})"><i class="badge-circle badge-circle-light-secondary font-medium-1" data-feather="edit"></i></button>
                                                </form>
                                                @endif
                                                <!-- Add other actions like edit, delete here if needed -->
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
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
    function confirmMarkAsPaid(id) {
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda tidak akan dapat mengembalikan data ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('markAsPaidForm-' + id).submit();
            }
        });
    }
</script>

@endsection
