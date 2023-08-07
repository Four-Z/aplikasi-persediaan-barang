@extends('layouts.auth')

@section('content')
    <section class="h-100 gradient-form" style="background-color: #eee;">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-xl-10">
                    <div class="card rounded-3 text-black">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="card-body p-md-5 mx-md-4">

                                    <div class="text-center">
                                        <img src="{{ asset('img/electronics-shop.png') }}" style="width: 125px;"
                                            alt="logo">
                                        <h4 class="mt-1 mb-5 pb-1">CV Bangkit Berkah Elektronik</h4>
                                    </div>

                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <p>Silahkan masuk ke akun anda</p>


                                        <div class="form-outline mb-4">
                                            <input type="email" id="form2Example11"
                                                class="form-control @error('email') is-invalid @enderror" name="email"
                                                value="{{ old('email') }}" required autocomplete="email" autofocus />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                            <label class="form-label" for="form2Example11">Username</label>
                                        </div>

                                        <div class="form-outline mb-4">
                                            <input type="password" id="form2Example22"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                required autocomplete="current-password" />
                                            <label class="form-label" for="form2Example22">Password</label>
                                        </div>

                                        <div class="text-center pt-1 mb-5 pb-1">
                                            <button type="submit"
                                                class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3"
                                                style="border: none;">
                                                {{ __('Login') }}
                                            </button>
                                            {{-- <a class="text-muted" href="#!">Forgot password?</a> --}}
                                        </div>

                                        {{-- <div class="d-flex align-items-center justify-content-center pb-4">
                                            <p class="mb-0 me-2">Don't have an account?</p>
                                            <button type="button" class="btn btn-outline-danger">Create new</button>
                                        </div> --}}

                                    </form>

                                </div>
                            </div>
                            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
                                <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                                    <h4 class="mb-4">CV Bangkit Berkah Elektronik</h4>
                                    <p class="small mb-0">CV Bangkit Berkah Elektronik, sebagai perusahaan terkemuka di
                                        bidang elektronik, menyediakan berbagai produk dan layanan berkualitas tinggi.
                                        Dengan komitmen pada inovasi dan kualitas produk, perusahaan ini menjadi pilihan
                                        utama bagi konsumen yang menginginkan solusi elektronik yang dapat diandalkan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


{{-- @section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Login') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                            {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection --}}
