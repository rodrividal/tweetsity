<div class="header">
    <div class="container">
        <div class="row">
            <div class="header_top_left">
                <div class="social-nav">
                    <p>Follow us:</p>
                    <ul class="header_socil list-inline pull-left">
                        <li>
                            <a href="https://facebook.com/tweetsity" target="_blank">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://twitter.com/tweetsity" target="_blank">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="https://instagram.com/tweetsity" target="_blank">
                                <i class="fa fa-instagram"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header_top_right list-unstyled">
                <ul>
                    <li>
                        <i class="fa fa-envelope-o"></i>
                        <span class="top-title"><a class="text-white" href="mailto:info@tweetsity.com">info@tweetsity.com</a></span>
                    </li>
                    <li>
                        <i class="fa fa-phone"></i>
                        <span class="top-title"><a class="text-white" href="tel:+1123234442">+1 123 234 442</a></span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="nav_sticky navigation">
    <div class="container">
        <div class="row">
            <div class="logo col-md-3">
                <a href="{{ url('') }}"><img class="img-responsive" src="{{ url('assets/images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <div id="navigation" class="menu_wrp">
                    <ul>
                        <li><a href="{{ url('') }}"><i class="fa fa-home"></i> Home</a></li>
                        @auth
                            <li class="has-sub"><a href="{{ url('entries') }}"><i class="fa fa-file"></i> My entries</a>
                                <ul>
                                    <li><a href="{{ url('entries/create') }}">New entry</a></li>
                                </ul>
                            </li>
                        @endauth
                        <li><a href="{{ url('contact') }}"><i class="fa fa-envelope"></i> Contact</a></li>
                        @guest
                            <li><a href="{{ url('login') }}"><i class="fa fa-sign-in"></i> Sign in</a></li>
                            @if (Route::has('register'))
                                <li><a href="{{ url('register') }}"><i class="fa fa-user-plus"></i> Sign up</a></li>
                            @endif
                        @else
                            <li class="has-sub"><a href="{{ url('users/' . Auth::user()->id) }}"><i class="fa fa-user"></i> {{ Auth::user()->surname . ', ' . Auth::user()->name }}</a>
                                <ul>
                                    <li><a href="{{ url('users/' . Auth::user()->id . '/edit') }}">Edit account</a></li>
                                    <li><a href="{{ url('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout</a>
                                    </li>
                                </ul>
                            </li>

                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        @endguest

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
