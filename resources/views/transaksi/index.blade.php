@extends('layouts.main')

@section('contents')
    <div id="app">
        @include('layouts.sidebar')
        <div id="main">
            @yield('transaction-content')
            @include('layouts.footer')
        </div>
    </div>
@endsection