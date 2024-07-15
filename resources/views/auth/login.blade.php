@extends('layouts.app')
@section('title', ' | login')
@section('content')
    <div class="row justify-content-center">

        <div class="col-xl-4 col-lg-6 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
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
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
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
                                    <div class="form-group">
                                        <input type="password" id="exampleInputPassword" type="password"
                                            class="form-control  form-control-use @error('password') is-invalid @enderror"
                                            name="password" required autocomplete="current-password" placeholder="Password">
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            {{-- <input type="checkbox"  class="custom-control-input" id="customCheck"> --}}
                                            <input class="custom-control-input" type="checkbox" name="remember"
                                                id="customCheck" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="customCheck">Remember
                                                Me</label>
                                        </div>
                                    </div>
                                    <div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                        <hr>

                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                                <a class="small none-deco" href="{{ route('password.request') }}">
                                                    {{ __('Forgot Password?') }}
                                                </a>
                                            @endif
                                        </div>
                                        <div class="text-center">
                                            <a class="small none-deco" href="{{ route('register') }}">Create an Account!</a>
                                        </div>
                                        </hr>

                                    </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    @endsection
