@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">

        <div class="col-xl-6 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg mt-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        <div>
                            <div class="p-5">

                                <div class="logo-brand-crm">
                                    <a class="logo-brand-crm d-flex align-items-center justify-content-center"
                                        href="{{ route('login') }}">
                                        <div class="sidebar-brand-icon rotate-n-15">
                                            <i class="fas fa-laugh-wink"></i>
                                        </div>
                                        <div class="sidebar-brand-text mx-3">{{ config('app.name', 'Laravel') }}</div>
                                    </a>
                                </div>
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Reset Password</h1>
                                </div>
                                <form form method="POST" action="{{ route('password.email') }}">
                                    @csrf

                                    <div class="form-group">
                                        <input type="email" c lass="form-control form-control-user"id="email"
                                            type="email"
                                            class="form-control form-control-user @error('email') is-invalid @enderror"
                                            name="email" value="{{ old('email') }}" required autocomplete="email"
                                            autofocus aria-describedby="emailHelp" placeholder="Enter Email Address...">
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Send Reset Password
                                        </button>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        {{-- blhe  --}}
        {{-- <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">{{ __('Reset Password') }}</div>

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <form method="POST" action="{{ route('password.email') }}">
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

                                <div class="row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            {{ __('Send Password Reset Link blehh') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    @endsection
