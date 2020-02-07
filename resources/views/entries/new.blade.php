@extends('layouts.app')

@section('scripts')
    <script src="{{ url('assets/js/main.js') }}"></script>
@endsection

@section('content')
    <header id="page-top" class="blog-banner">
        <div class="container" id="blog">
            <div class="row blog-header text-center wow fadeInUp">
                <div class="col-sm-12">
                    <h3>New entry</h3>
                    <h4><a href="{{ url('') }}"> Home </a> &gt; <a href="{{ url('entries') }}"> My entries </a> &gt; New entry</h4>
                </div>
            </div>
        </div>
    </header>

    <div class="blog-section blog_style blog_page_one pad_tb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 standard-form-warper">
                    <form id="standard-form" method="POST" action="{{ url('entries') }}">
                        @csrf

                        @include('entries._form')
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
