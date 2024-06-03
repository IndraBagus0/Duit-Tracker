@extends('layouts.main')

@section('contents')
<body>
    <div id="auth">
        
<div class="row h-100">
    <div class="col-lg-5 col-12">
        <div id="auth-left">
            <div class="auth-logo">
                <a href="/"><img src="{{asset ('template/assets/images/logo/logo.svg')}}" alt="Logo"></a>
            </div>
            <h1 class="auth-title">Log in.</h1>
            <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>
            @if (session()->has('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <form method="post" action="/">
                @csrf
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="text" name="email" class="form-control  @error('email') form-control-xl @enderror" placeholder="Email">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                    @error('email')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
                </div>
                <div class="form-group position-relative has-icon-left mb-4">
                    <input type="password" name="password" class="form-control @error('password') form-control-xl @enderror" placeholder="Kata Sandi">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
      @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Masuk</button>
            </>
            <div class="text-center mt-5 text-lg fs-4">
                <p class="text-gray-600">Belum punya akun? <a href="/register" class="font-bold">Buat Akun?</a></p>
                <p><a class="font-bold" href="auth-forgot-password.html">Lupa Password ?</a></p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right">

        </div>
    </div>
</div>

    </div>
</body>

</html>


@endsection

