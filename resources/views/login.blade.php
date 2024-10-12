@extends('layouts.frontend')
@section('title')
    Login
@endsection
@section('content')
    <!-- Header End -->
    <div class="container-fluid py-5 bg-dark page-header mb-5" style="z-index: -1;">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Login</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">Login</a></li> --}}
                    <li class="breadcrumb-item text-white active" aria-current="page">Login</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl" style="margin-top: -350px;">
        <div class="container">
            <h3 class="text-center mb-5 wow fadeInUp text-light" data-wow-delay="0.1s">
                Please Login to Your Account!
            </h3>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-sm-12 col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                            @if(Session::has('error'))
                                <div class="alert alert-danger">{{ Session::get('error') }}</div>
                            @endif
                            <div class="d-flex align-items-center bg-light rounded p-4 shadow-lg">


                                <form action="{{ route('login.authenticate') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">

                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email">
                                                @error('email')
                                                    <span class="text-danger">* {{ $message }}</span>
                                                @enderror
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-floating">
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                                @error('password')
                                                    <span class="text-danger">* {{ $message }}</span>
                                                @enderror
                                                <label for="password">Password</label>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit"><i class="fas fa-sign-in-alt me-1" aria-hidden="true"></i> Login</button>
                                        </div>
                                        <div class="col-12 mt-5 mb-3 text-center">
                                            Don't have an account? <a href="{{ route('register') }}">Register Now</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
@endsection
