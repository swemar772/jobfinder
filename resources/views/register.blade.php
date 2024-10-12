@extends('layouts.frontend')
@section('title')
    Register
@endsection
@section('content')
    <!-- Header End -->
    <div class="container-fluid py-5 bg-dark page-header mb-5" style="z-index: -1;">
        <div class="container my-5 pt-5 pb-4">
            <h1 class="display-3 text-white mb-3 animated slideInDown">Register</h1>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb text-uppercase">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    {{-- <li class="breadcrumb-item"><a href="#">Register</a></li> --}}
                    <li class="breadcrumb-item text-white active" aria-current="page">Register</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-xxl" style="margin-top: -350px;">
        <div class="container">
            <h3 class="text-center mb-5 wow fadeInUp text-light" data-wow-delay="0.1s">Please Create an Account!</h3>
            <div class="row g-4">
                <div class="col-12">
                    <div class="row gy-4 justify-content-center">
                        <div class="col-sm-12 col-md-4 col-lg-4 wow fadeIn" data-wow-delay="0.1s">
                            <div class="d-flex align-items-center bg-light rounded p-4 shadow-lg">
                                <form action="{{ route('register.store') }}" method="POST">
                                    @csrf
                                    <div class="row g-3">
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" name="name" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Your Name">
                                                @error('name')
                                                    <span class="text-danger">* {{ $message }}</span>
                                                @enderror
                                                <label for="name">Your Name</label>
                                            </div>
                                        </div>
                                        <div class="col-md-12 col-sm-12 col-lg-12">
                                            <div class="form-floating">
                                                <input type="text" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="Your Email">
                                                @error('email')
                                                    <span class="text-danger">* {{ $message }}</span>
                                                @enderror
                                                <label for="email">Your Email</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <div class="form-floating">
                                                <input type="password" name="password" value="{{ old('password') }}" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password">
                                                @error('password')
                                                    <span class="text-danger">* {{ $message }}</span>
                                                @enderror
                                                <label for="password">Password</label>
                                            </div>
                                        </div>
                                        <div class="col-12 col-sm-12 col-lg-12">
                                            <div class="form-floating">
                                                <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Confirm Password">
                                                @error('password_confirmation')
                                                    <span class="text-danger">* {{ $message }}</span>
                                                @enderror
                                                <label for="password_confirmation">Confirm Password</label>
                                            </div>
                                        </div>
                                        {{-- <div class="col-12">
                                            <div class="form-floating">
                                                <textarea class="form-control" placeholder="Leave a message here" id="message" style="height: 100px"></textarea>
                                                <label for="message">Message</label>
                                            </div>
                                        </div> --}}
                                        <div class="col-12">
                                            <button class="btn btn-primary w-100 py-3" type="submit"><i class="fas fa-sign-in-alt me-1" aria-hidden="true"></i> Register</button>
                                        </div>
                                        <div class="col-12 mt-3 mb-3 text-center">
                                            Already have an account? <a href="{{ route('login') }}">Login Now</a>
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
