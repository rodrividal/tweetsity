@extends('layouts.app')

@section('scripts')
    <script src="{{ url('assets/js/main.js') }}"></script>
@endsection

@section('content')

    <header id="page-top" class="blog-banner">
        <div class="container" id="blog">
            <div class="row blog-header text-center wow fadeInUp">
                <div class="col-sm-12">
                    <h3>Edit account</h3>
                    <h4><a href="{{ url('') }}"> Home </a> &gt; Edit account</h4>
                </div>
            </div>
        </div>
    </header>

    <div class="blog-section blog_style blog_page_one pad_tb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 standard-form-warper">
                    <form id="standard-form" method="POST" action="{{ url('users/' . Auth::user()->id) }}">
                        @csrf
                        <input type="hidden" name="_method" value="PUT">

                        <div class="col-sm-12 col-lg-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    @error('name')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                    <input value="{{ Auth::user()->name }}" placeholder="Name" id="name" type="text" class="con-field @error('name') is-invalid @enderror" name="name" required autocomplete="name" autofocus>
                                </div>

                                <div class="col-sm-12">
                                    @error('surname')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                    <input value="{{ Auth::user()->surname }}"  placeholder="Surname" id="surname" type="text" class="con-field @error('surname') is-invalid @enderror" name="surname" required autocomplete="surname" autofocus>
                                </div>

                                <div class="col-sm-12">
                                    @error('username')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                    <input value="{{ Auth::user()->username }}" placeholder="Username" id="username" type="text" class="con-field @error('username') is-invalid @enderror" name="username" required autocomplete="username" autofocus>
                                </div>

                                <div class="col-sm-12">
                                    @error('twitter_username')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                    <input value="{{ Auth::user()->twitter_username }}" placeholder="Twitter username (with the leading @ symbol)" pattern="^@[A-Za-z0-9_]{1,15}$" id="twitter_username" type="text" class="con-field @error('twitter_username') is-invalid @enderror" name="twitter_username" required autocomplete="twitter_username" autofocus>
                                </div>

                                <div class="col-sm-12">
                                    @error('email')
                                    <span class="invalid-feedback d-block" role="alert">
                                    <strong>{{ $message }}</strong>
                                 </span>
                                    @enderror
                                    <input value="{{ Auth::user()->email }}" placeholder="E-mail" id="email" type="email" class="con-field @error('email') is-invalid @enderror" name="email" required autocomplete="email">
                                </div>

                                <div class="col-sm-12 mb-5b">
                                    <div class="submit-area">
                                        <input type="submit" id="submit-form" class="btn-alt" value="Update">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
