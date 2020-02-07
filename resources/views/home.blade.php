@extends('layouts.app')

@section('scripts')
    <script src="{{ url('assets/js/main.js') }}"></script>
@endsection

@section('content')
    <header id="page-top" class="blog-banner">
        <div class="container" id="blog">
            <div class="row blog-header text-center wow fadeInUp">
                <div class="col-sm-12">
                    <h3>Home</h3>
                    <h4><a> An amazing blog </a> </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="blog-section blog_style blog_page_one pad_tb_70">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 blog-area">
                    <div class="row">
                        @foreach($entries as $entry)
                            <div class="col-lg-12 col-sm-12 blog_box">
                                <div class="blog_info_right">
                                    <div class="blog_date_athor">
                                        <span><i class="fa fa-user"></i> <a href="{{ url('users/' . $entry->user_id) }}">{{ $entry->author_surname . ', ' . $entry->author_name }}</a></span>
                                        <i class="fa fa-calendar"></i>  <span class="blog_post_date"> {{ $entry->updated_at }}</span>
                                        @auth
                                            @if($entry->user_id == Auth::user()->id)
                                                <i class="fa fa-pencil"></i>  <span> <a href="{{ url('entries/' . $entry->id . '/edit') }}">Edit</a></span>
                                            @endif
                                        @endauth
                                    </div>
                                    <a><h3>{{ $entry->title }}</h3></a>
                                    <p>{{ $entry->content }}</p>
                                </div>
                            </div>
                        @endforeach

                        <div class="col-md-12">
                            <nav class="blog_pagination">
                                {{ $entries->render() }}
                            </nav>
                        </div>

                    </div>
                </div>

                <div class="col-lg-4 col-xs-12 widget-area">
                    @auth
                        <aside class="widget">
                            <div class="">
                                <a href="{{ url('entries/create') }}" class="width-100 btn btn-warning">New entry</a>
                            </div>
                        </aside>
                    @endauth
                    <aside class="widget wiget-recent-post">
                        <h3 class="widget-title">Some users who joined us recently!</h3>
                        @foreach($lastJoinedUsers as $user)
                            <div class="recent-post-box">
                                <div class="recent-title">
                                    <a href="{{ url('users/' . $user->id) }}">{{ $user->surname . ', ' . $user->name }} | {{ $user->username }}</a>
                                    <a target="_blank" href="https://twitter.com/{{ $user->twitter_username }}"><i class="fa fa-twitter"></i> Follow</a>
                                    <p class="mt-0">{{ $user->created_at }}</p>
                                </div>
                            </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
