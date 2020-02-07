@extends('layouts.app')

@section('scripts')
    <script src="{{ url('assets/js/main.js') }}"></script>
@endsection

@section('content')

<header id="page-top" class="blog-banner">
    <div class="container" id="blog">
        <div class="row blog-header text-center wow fadeInUp">
            <div class="col-sm-12">
                <h3>Sign in</h3>
                <h4><a href="{{ url('') }}"> Home </a> &gt; Sign in</h4>
            </div>
        </div>
    </div>
</header>

<div class="blog-section blog_style blog_page_one pad_tb_70">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 standard-form-warper">
                <form id="standard-form" method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="col-sm-12 col-lg-12">
                        <div class="row">
                            <div class="col-sm-12">
                                @error('email')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                @enderror
                                <input placeholder="E-mail" id="email" type="email" class="con-field @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            </div>

                            <div class="col-sm-12">
                                @error('password')
                                <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                <input placeholder="Password" id="password" type="password" class="con-field @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            </div>
                            <div class="col-lg-5 col-sm-12">
                                <div class="submit-area">
                                    <input type="submit" id="submit-form" class="btn-alt" value="Login">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="col-lg-5 col-sm-12">
                    <div class="submit-area">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
