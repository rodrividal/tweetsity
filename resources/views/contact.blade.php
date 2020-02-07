@extends('layouts.app')

@section('scripts')
    <script src="{{ url('assets/js/main.js') }}"></script>
@endsection

@section('content')
    <header id="page-top" class="blog-banner">
        <div class="container" id="blog">
            <div class="row blog-header text-center wow fadeInUp">
                <div class="col-sm-12">
                    <h3>Contact Us</h3>
                    <h4><a href="{{ url('') }}"> Home </a> &gt; Contact </h4>
                </div>
            </div>
        </div>
    </header>

    <section class="contact-page pad_tb_70">
        <div class="container">
            <div class="inner-contact">
                <div class="row">
                    <div class="col-lg-4 col-sm-12">
                        <div class="base-header base_header_two">
                            <h3>Get in Touch</h3>
                            <p>Any suggestion to improve our website? Please let us know! </p>
                        </div>
                        <div class="contact-addrs">
                            <h3><i class="fa fa-envelope"></i> Email Address  <span> info@tweetsity.com</span></h3>
                            <h3><i class="fa fa-location-arrow"></i> Site Location <span> Buenos Aires, Argentina</span></h3>
                            <h3><i class="fa fa-phone"></i> Phone Number <span> +54 9 11 5593 2034</span></h3>
                        </div>
                    </div>

                    <div class="col-lg-8 col-sm-12">
                        <div class="map-container">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d26283.52241458491!2d-58.45158260738399!3d-34.567723999975804!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcb58ed9532093%3A0x357a9ecb56bdbfc9!2sAreaTres%20El%20Salvador!5e0!3m2!1ses!2sar!4v1581023444350!5m2!1ses!2sar" style="border:0" allowfullscreen="" height="420"></iframe>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="standard-form-warper">
                            <form method="post" action="{{ url('contact') }}" id="standard-form">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-12 col-lg-5">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input class="con-field" name="name" id="name" type="text" @auth value="{{ Auth::user()->surname . ' ' . Auth::user()->name }}" @endauth placeholder="Full Name (*)" required>
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="con-field" name="email" id="email" type="text" @auth value="{{ Auth::user()->email }}" @endauth placeholder="Email Address (*)" required>
                                            </div>
                                            <div class="col-sm-12">
                                                <input class="con-field" name="phone_number" id="phone" type="text" placeholder="Phone Number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12 col-lg-7">
                                        <textarea class="con-field" name="message" id="message" rows="6" placeholder="Your Message"></textarea>
                                    </div>
                                    <div class="col-lg-5 col-sm-12">
                                        <div class="submit-area">
                                            <input type="submit" id="submit-form" class="btn-alt" value="Send message">
                                            <div id="msg" class="message"></div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
