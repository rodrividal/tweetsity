@extends('layouts.app')

@section('scripts')
    <script src="{{ url('assets/js/main.js') }}"></script>
    <script src="{{ url('assets/js/hidetweet.js') }}"></script>
@endsection

@section('content')
    <header id="page-top" class="blog-banner">
        <div class="container" id="blog">
            <div class="row blog-header text-center wow fadeInUp">
                <div class="col-sm-12">
                    <h3>My entries</h3>
                    <h4><a href="{{ url('') }}"> Home </a> &gt; My entries </h4>
                </div>
            </div>
        </div>
    </header>

    <div class="blog-section blog_style blog_page_one pad_tb_70">
        <div class="container">
            <div class="row">
                <!-- Blog Area -->
                <div class="col-lg-8 blog-area">
                    <div class="row">
                        @foreach($entries as $entry)
                            <div class="col-lg-12 col-sm-12 blog_box">
                                <div class="blog_info_right">
                                    <div class="blog_date_athor">
                                        <span><i class="fa fa-user"></i> <a href="{{ url('users/' . $entry->user_id) }}">{{ $entry->author_surname . ', ' . $entry->author_name }}</a></span>
                                        <i class="fa fa-calendar"></i>  <span class="blog_post_date"> {{ $entry->updated_at }}</span>
                                        <i class="fa fa-pencil"></i>  <span> <a href="{{ url('entries/' . $entry->id . '/edit') }}">Edit</a></span>
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
                    <aside class="widget">
                        <div class="">
                            <a href="{{ url('entries/create') }}" class="width-100 btn btn-warning">New entry</a>
                        </div>
                    </aside>
                    <aside class="widget wiget-recent-post">
                        <h3 class="widget-title"><i class="fa fa-twitter"></i> My latest tweets</h3>
                        @if(count($tweets) == 0)
                            <div class="recent-post-box">
                                <div class="recent-title">
                                    <a>There aren't recent tweets or the account does not exist.</a>
                                </div>
                            </div>
                        @else
                            @foreach($tweets as $tweet)
                                <div class="recent-post-box">
                                    <div class="recent-title">
                                        <a>{{ $tweet->text }}</a>
                                        <p class="mt-0 mb-0"><a target="_blank" href="https://twitter.com/zaupita/status/{{ $tweet->id_str }}">{{ $tweet->created_at }}</a></p>
                                        @if(isset($tweet->belongs_to_logged_in_user) and $tweet->belongs_to_logged_in_user)
                                            @if($tweet->visible)
                                                <p id="{{ $tweet->id_str }}" class="hide-tweet" onclick="hideTweet('{{ url('hide_tweet') }}', this)">Hide tweet</p>
                                            @else
                                                <p id="{{ $tweet->id_str }}" class="hide-tweet" onclick="hideTweet('{{ url('hide_tweet') }}', this)">Un-Hide tweet</p>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </aside>
                </div>
            </div>
        </div>
    </div>
@endsection
