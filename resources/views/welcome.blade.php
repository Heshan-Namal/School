@extends('layouts.master')

@section('content')
<main class="page lanidng-page">
        <section class="portfolio-block block-intro">
            <div class="container">
                <div class="avatar" style="background: url(&quot;{{asset('assets/front/images/avatars/logo.jpeg')}}&quot;) center / cover;width: 250px;height: 250px;border-style: none;"></div>
                <div class="about-me">
                    <p>Designed to enhance the learning process of children by digitally transforming the teaching experience of teachers.</p>
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
                                <h3 class="card-title">Comprehensive Learning Management</h3>
                                <p class="card-text">Viduhala enables teachers to deliver effective and intuitive content in the forms of assessments, learning materials, and multimedia content for students. Furthermore, the easy navigation features help them assess the usage of the content distributed while managing lesson plans for an entire year. </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-lightbulb-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Real-time Attentiveness Monitoring</h3>
                                <p class="card-text">The unique in-class time-based attentiveness quizzes allow teachers to check trends of attentiveness and absenteeism in real-time. Data collated through automated results can be cross-linked with student performance to get in-depth details, gain insights and understand the needs of your students to offer differentiated learning techniques with a progressive approach to teaching.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card special-skill-item border-0">
                            <div class="card-header bg-transparent border-0"><i class="icon ion-ios-gear-outline"></i></div>
                            <div class="card-body">
                                <h3 class="card-title">Examinations Management Made Easy</h3>
                                <p class="card-text">Viduhala allows educators to manage exam results by entering and approving student marks systematically, enabling schools to generate automated reports, average calculations, and class-wise performance comparisons.</p>
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
                    <h3>An all-in-one end-to-end School Management System</h3>
                    <p>Viduhala is a seamlessly integrated School Management System designed exclusively for Sri Lankan schools that follow the local curriculum to optimize their operations and management. It provides school administrators with an easy mechanism to get a glimpse of their school, teachers, students, and all related activities in a few clicks. With multiple user portals, quick dashboard views, management of grades & classes, and reporting - school administrators can do away with a lot of time-consuming manually managed tasks.</p>
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
