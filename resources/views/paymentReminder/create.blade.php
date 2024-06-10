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
                <h3>Tambah Pengingat Pembayaran</h3>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        <form action="{{ route('paymentReminder.store') }}" method="POST">
                            @csrf
                            <div class="form-group has-icon-left">
                                <label for="date-name-icon">Tanggal Pengingat</label>
                                <div class="position-relative">
                                    <input type="date" class="form-control flatpickr-no-config flatpickr-input"
                                        name="reminderDate" placeholder="Pilih Tanggal" id="date-name-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-calendar-event"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="nominal-id-icon">Nominal</label>
                                <div class="position-relative">
                                    <input type="number" class="form-control" name="nominal" placeholder="Masukan Nominal"
                                        id="nominal-id-icon" required>
                                    <div class="form-control-icon">
                                        <i class="bi bi-cash-coin"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group has-icon-left">
                                <label for="note-id-icon">Catatan</label>
                                <div class="position-relative">
                                    <textarea id="deskripsi" name="description" class="form-control" placeholder="Masukan Catatan (tidak wajib)"></textarea>
                                    <div class="form-control-icon">
                                        <i class="bi bi-card-text"></i>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </form>
                    </div>
                </section>
            </div>

            @include('layouts.footer')
        </div>
    </div>
@endsection
