@extends('layouts.master')

@section('content')
<main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <div class="container">
                <div class="avatar" style="background: url(&quot;{{asset('assets/front/images/avatars/logo.jpeg')}}&quot;) center / cover;width: 250px;height: 250px;border-style: none;"></div>
                <div class="about-me">
                    <p>Hello! I am <strong>John Smith</strong>. I work as interface and front end developer. I have passion for pixel perfect, minimal and easy to use interfaces.</p>
                </div>
            </div>
        </section>
        <section class="portfolio-block photography">
            <div class="container">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="{{asset('assets/front/images/nature/image5.jpg')}}"></a></div>
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="{{asset('assets/front/images/nature/image2.jpg')}}"></a></div>
                    <div class="col-md-6 col-lg-4 item zoom-on-hover"><a href="#"><img class="img-fluid image" src="{{asset('assets/front/images/nature/image4.jpg')}}"></a></div>
                </div>
            </div>
        </section>
        <section class="portfolio-block call-to-action border-bottom">
            <div class="container">
                <div class="d-flex justify-content-center align-items-center content">
                    <h3>Before get started sign in to your account</h3><a href="{{ route('login') }}"><button class="btn btn-outline-primary btn-lg" type="button" >Sign in</button></a>
                </div>
            </div>
        </section>
        <section class="portfolio-block skills">
            <div class="container">
                <div class="heading">
                    <h2>About us</h2>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-star-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Web Design</h3>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Interface Design</h3>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Photography and Print</h3>
                                <p class="card-text">Nullam id dolor id nibh ultricies vehicula ut id elit. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <section class="portfolio-block website gradient">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-12 col-lg-5 offset-lg-1 text">
                    <h3>Principle Project</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean eget velit ultricies, feugiat est sed, efr nunc, vivamus vel accumsan dui. Quisque ac dolor cursus, volutpat nisl vel, porttitor eros.</p>
                </div>
                <div class="col-md-12 col-lg-5">
                    <div class="portfolio-laptop-mockup">
                        <div class="screen">
                            <div class="screen-content" style="background: url(&quot;{{asset('assets/front/images/avatars/logo.jpeg')}}&quot;) center / contain no-repeat;"></div>
                        </div>
                        <div class="keyboard"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
