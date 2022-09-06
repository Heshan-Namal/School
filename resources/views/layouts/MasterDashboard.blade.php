<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Viduhala</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link rel="stylesheet" href="{{asset('assets/front/bootstrap/css/bootstrap.min.css')}}">

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/student.css')}}">

    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/front/css/dashboard.css')}}">

    @yield('style')
</head>

<body id="page-top">
    <div id="wrapper">

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow topbar static-top">
                    <div class="container-fluid">
                        <!-- droup down nav items-->
                        <img class="rounded-circle" src="{{asset('assets/front/images/avatars/logo2.jpeg')}}">

                        <div class="navDroupdown form-control border-0 small">
                            <input type="text" class="navtext" placeholder="Home" readonly>
                            <div class="navOption ">
                                <a href='{{ url("/dashboard") }}'>
                                    <div>
                                        <ion-icon name="home-outline"></ion-icon><span>Home</span>
                                    </div>
                                </a>
                                @if(Qs::userIsTeamAd())
                                <a href="{{route('admin.student')}}">
                                    <div>
                                        <ion-icon name="person-outline"></ion-icon>Students
                                    </div>
                                </a>
                                <a href="{{route('view.fees')}}">
                                    <div>
                                        <ion-icon name="person-outline"></ion-icon>Facilities fees
                                    </div>
                                </a>
                                <a href="{{route('admin.teacher')}}">
                                    <div>
                                        <ion-icon name="woman-outline"></ion-icon>Teachers
                                    </div>
                                </a>
                                @endif
                                @if(Qs::userIsTeamSu())
                                <a href="{{route('myclass.students')}}">
                                    <div>
                                        <ion-icon name="person-outline"></ion-icon>Students
                                    </div>
                                </a>
                                <a href="#">
                                    <div>
                                        <ion-icon name="book-outline"></ion-icon>View term test
                                    </div>
                                </a>
                                <a href="#">
                                    <div>
                                        <ion-icon name="book-outline"></ion-icon>View term test
                                    </div>
                                </a>
                                <a href="{{route('myclass.termtest')}}">
                                    <div>
                                        <ion-icon name="book-outline"></ion-icon>Add termtest result
                                    </div>
                                </a>
                                @endif
                                @if(Qs::userIsTeamTe())

                                <a href="{{route('teacher.subjects')}}">
                                    <div>
                                        <ion-icon name="book-outline"></ion-icon>Subjects
                                    </div>
                                </a>
                                @endif
                                @if(Qs::userIsTeamLe())
                                <a href="{{route('Student.student_subject.mysubjects',[getAdmissionNo()])}}">
                                    <div>
                                        <ion-icon name="book-outline"></ion-icon>Subjects
                                    </div>
                                </a>
                                <a href="{{route('Student.student.examResults')}}">
                                    <div>
                                        <ion-icon name="book-outline"></ion-icon>Termtest results
                                    </div>
                                </a>
                                <a href="{{route('std.fees')}}">
                                    <div>
                                        <ion-icon name="time-outline"></ion-icon>Facilities fees
                                    </div>
                                </a>
                                @endif



                                <a href="{{route('user.edit',[auth()->user()->id])}}">
                                    <div>
                                        <ion-icon name="alert-circle-outline"></ion-icon>Profile
                                    </div>
                                </a>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <div>
                                        <ion-icon name="alert-circle-outline"></ion-icon>Logout
                                    </div>
                                </a>
                            </div>
                        </div>

                        <form class="d-none d-sm-inline-block me-auto ms-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group"><input class="bg-light form-control border-0 small" type="hidden"
                                    placeholder="Search for ..."></div>
                        </form>


                        <!-- notification -->
                        <!-- <div class="wrapper"> -->
                        <div class="navbar_right">
                            <div class="notifications">
                                <div class="icon_wrap"><i class="far fa-bell"></i></div>
                                <div class="notification_dd">
                                    <ul class="notification_ul px-0">
                                        <li class="pizzahut failed">
                                            <div class="notify_icon">
                                                <span class="icon"><img class="rounded-circle"
                                                        src="{{asset('assets/front/images/avatars/avatar4.jpeg')}}"></span>
                                            </div>
                                            <div class="notify_data">
                                                <div class="title">
                                                    Lorem, ipsum dolor.
                                                </div>
                                                <div class="sub_title">
                                                    Lorem ipsum dolor sit amet consectetur.
                                                </div>
                                            </div>
                                            <div class="notify_status">
                                                <p>2 min ago</p>
                                            </div>
                                        </li>
                                        <li class="pizzahut failed">
                                            <div class="notify_icon">
                                                <span class="icon"><img class="rounded-circle"
                                                        src="{{asset('assets/front/images/avatars/avatar4.jpeg')}}"></span>
                                            </div>
                                            <div class="notify_data">
                                                <div class="title">
                                                    Lorem, ipsum dolor.
                                                </div>
                                                <div class="sub_title">
                                                    Lorem ipsum dolor sit amet consectetur.
                                                </div>
                                            </div>
                                            <div class="notify_status">
                                                <p>Failed</p>
                                            </div>
                                        </li>
                                        <li class="pizzahut failed">
                                            <div class="notify_icon">
                                                <span class="icon"><img class="rounded-circle"
                                                        src="{{asset('assets/front/images/avatars/avatar4.jpeg')}}"></span>
                                            </div>
                                            <div class="notify_data">
                                                <div class="title">
                                                    Lorem, ipsum dolor.
                                                </div>
                                                <div class="sub_title">
                                                    Lorem ipsum dolor sit amet consectetur.
                                                </div>
                                            </div>
                                            <div class="notify_status">
                                                <p>Failed</p>
                                            </div>
                                        </li>
                                        <li class="pizzahut failed">
                                            <div class="notify_icon">
                                                <span class="icon"><img class="rounded-circle"
                                                        src="{{asset('assets/front/images/avatars/avatar4.jpeg')}}"></span>
                                            </div>
                                            <div class="notify_data">
                                                <div class="title">
                                                    Lorem, ipsum dolor.
                                                </div>
                                                <div class="sub_title">
                                                    Lorem ipsum dolor sit amet consectetur.
                                                </div>
                                            </div>
                                            <div class="notify_status">
                                                <p>Failed</p>
                                            </div>
                                        </li>
                                        <li class="kfc success">
                                            <div class="notify_icon">
                                                <span class="icon"></span>
                                            </div>
                                            <div class="notify_data">
                                                <div class="title">
                                                    Lorem, ipsum dolor.
                                                </div>
                                                <div class="sub_title">
                                                    Lorem ipsum dolor sit amet consectetur.
                                                </div>
                                            </div>
                                            <div class="notify_status">
                                                <p>Success</p>
                                            </div>
                                        </li>
                                        <li class="show_all pb-1">
                                            <p class="link">Show All Activities</p>
                                        </li>
                                    </ul>
                                </div>

                            </div>

                        </div>

                        <span class="text-danger">{{Auth::user()->name}}</span>
                        <span class="text-danger">({{Auth::user()->user_type}})</span>
                    </div>

                    <div class="popup">
                        <div class="shadow"></div>
                        <div class="inner_popup">
                            <div class="notification_dd">
                                <ul class="notification_ul">
                                    <li class="title">
                                        <p>All Notifications</p>
                                        <p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
                                    </li>
                                    <li class="starbucks success">
                                        <div class="notify_icon">
                                            <span class="icon"></span>
                                        </div>
                                        <div class="notify_data">
                                            <div class="title">
                                                Lorem, ipsum dolor.
                                            </div>
                                            <div class="sub_title">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                        <div class="notify_status">
                                            <p>Success</p>
                                        </div>
                                    </li>
                                    <li class="baskin_robbins failed">
                                        <div class="notify_icon">
                                            <span class="icon"></span>
                                        </div>
                                        <div class="notify_data">
                                            <div class="title">
                                                Lorem, ipsum dolor.
                                            </div>
                                            <div class="sub_title">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                        <div class="notify_status">
                                            <p>Failed</p>
                                        </div>
                                    </li>
                                    <li class="mcd success">
                                        <div class="notify_icon">
                                            <span class="icon"></span>
                                        </div>
                                        <div class="notify_data">
                                            <div class="title">
                                                Lorem, ipsum dolor.
                                            </div>
                                            <div class="sub_title">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                        <div class="notify_status">
                                            <p>Success</p>
                                        </div>
                                    </li>
                                    <li class="pizzahut failed">
                                        <div class="notify_icon">
                                            <span class="icon"></span>
                                        </div>
                                        <div class="notify_data">
                                            <div class="title">
                                                Lorem, ipsum dolor.
                                            </div>
                                            <div class="sub_title">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                        <div class="notify_status">
                                            <p>Failed</p>
                                        </div>
                                    </li>
                                    <li class="kfc success">
                                        <div class="notify_icon">
                                            <span class="icon"></span>
                                        </div>
                                        <div class="notify_data">
                                            <div class="title">
                                                Lorem, ipsum dolor.
                                            </div>
                                            <div class="sub_title">
                                                Lorem ipsum dolor sit amet consectetur.
                                            </div>
                                        </div>
                                        <div class="notify_status">
                                            <p>Success</p>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- </div> -->
                        <!-- End notification -->

                    </div>
                </nav>
                <div class="container-fluid d-flex bd-highlight ">

                    <div class="p-2 flex-grow-1 bd-highlight">

                        @if(Session::get('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>

                        @endif
                        @if(Session::get('fail'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ Session::get('fail') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                        @endif

                        @yield('content')

                    </div>


                </div>
            </div>
            <footer class="bg-white sticky-footer">
                <div class="container my-auto">
                    <div class="text-center my-auto copyright"><span>Copyright © Team 11</span></div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>


    <script src="{{asset('assets/front/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/front/js/chart.min.js')}}"></script>
    <script src="{{asset('assets/front/js/bs-init.js')}}"></script>
    <script src="{{asset('assets/front/js/theme.js')}}"></script>
    <script src="{{asset('assets/front/js/navDropdown.js')}}"></script>
    <script src="{{asset('assets/front/js/termDropdown.js')}}"></script>
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="{{asset('assets/front/js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('assets/front/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('assets/front/js/carousel.js')}}"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script>
    @if(Session::has('message'))
    var type = "{{Session::get('alert-type','info')}}"

    switch (type) {
        case 'info':
            toastr.info("{{ Session::get('message') }}");
            break;
        case 'success':
            toastr.success("{{ Session::get('message') }}");
            break;
        case 'warning':
            toastr.warning("{{ Session::get('message') }}");
            break;
        case 'error':
            toastr.error("{{ Session::get('message') }}");
            break;
        default:
            toastr.error("{{ Session::get('message') }}");

    }

    @endif
    </script>
    <script>
    $(".profile .icon_wrap").click(function() {
        $(this).parent().toggleClass("active");
        $(".notifications").removeClass("active");
    });

    $(".notifications .icon_wrap").click(function() {
        $(this).parent().toggleClass("active");
        $(".profile").removeClass("active");
    });

    $(".show_all .link").click(function() {
        $(".notifications").removeClass("active");
        $(".popup").show();
    });

    $(".close, .shadow").click(function() {
        $(".popup").hide();
    });
    </script>
    <!-- Your application script -->


    @yield('script')
</body>

</html>