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
            <h3>Tambah Pengingat Pembayaran</h3>
            <p class="text-subtitle text-muted">Berikut adalah fitur tambah pengingat pembayaran.</p>
        </div>
        <div class="col-12 col-md-6 mt-md-0">
            <div class="text-md-end mb-3 mb-md-0">
                <a href="/pengingat_pembayaran" class="btn btn-primary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
            </div>
        </div>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        
    </div>

</div>

<section class="section">
    <div class="card">
        <div class="card-body">
        <form class="form" action="{{ route('pengingat_pembayaran.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-md-12">
        <div class="form-group mandatory">
                            <label for="tanggal_pengingat" class="form-label">Tanggal Pengingat</label>
                            <input type="date" id="tanggal_pengingat" name="tanggal_pengingat" class="form-control" required>
                        </div>
                        <div class="form-group mandatory">
                            <label for="nominal" class="form-label">Nominal</label>
                            <input type="text" id="nominal" name="nominal" class="form-control" required>
                        </div>
                        <div class="form-group mandatory" >
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea id="deskripsi" name="deskripsi" class="form-control" required></textarea>
                        </div>

            <div class="form-group text-end mt-3 mb-0">
                <button type="submit" class="btn btn-primary me-2">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
            </div>
        </div>
    </div>
</form>

        </div>
    </div>
</section>


        </div>
    </section>

    <script>
            var saldo = document.getElementById('nominal');
            saldo.addEventListener('keyup', function(e) {
                this.value = removeLeadingZeros(this.value);
                this.value = formatRupiah(this.value, 'Rp. ');
            });

            function removeLeadingZeros(value) {
                return value.replace(/^0+/, '');
            }
            
            function formatRupiah(angka, prefix) {
                var number_string = angka.replace(/[^,\d]/g, '').toString(),
                    split    = number_string.split(','),
                    sisa     = split[0].length % 3,
                    rupiah     = split[0].substr(0, sisa),
                    ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
                    
                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }
                
                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }
        </script>

        @include('layouts.footer')
    </div>
</div>
@endsection