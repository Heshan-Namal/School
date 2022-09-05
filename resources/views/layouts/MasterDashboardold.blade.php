
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Viduhala</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
   
    <link rel="stylesheet" href="{{asset('assets/front/bootstrap/css/bootstrap.min.css')}}">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/fonts/fontawesome5-overrides.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/front/css/owl.theme.default.min.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">


    @yield('style')
</head>

<body id="page-top">
    <div id="wrapper">

        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow topbar static-top">
                    <div class="container-fluid">
                        <!-- droup down nav items-->
                        <img class="rounded-circle" src="{{asset('assets/front/images/avatars/avatar4.jpeg')}}">

                        <div class="navDroupdown form-control border-0 small">
                            <input  type="text" class="navtext" placeholder="Home" readonly>
                            <div class="navOption ">
                                @if(Qs::userIsTeamLe())
                                    <a href="{{route('dashboard')}}"><div><ion-icon name="home-outline"></ion-icon><span>Home</span></div></a>
                                    <a href="{{route('Student.student_subject.mysubjects',[getAdmissionNo()])}}"><div><ion-icon name="book-outline"></ion-icon>Subjects</div></a>
                                    <a href="{{route('Student.student.examResults')}}"><div><ion-icon name="school-outline"></ion-icon>Exam Results</div></a>
                                    <a href="#"><div><ion-icon name="time-outline"></ion-icon>Time Table</div></a>
                                    <a href="#"><div><ion-icon name="alert-circle-outline"></ion-icon>Notices</div></a>
                                @endif

                                @if(Qs::userIsTeamAd())
                                <div class="navOption ">
                                    <a href='{{ url("/dashboard") }}'><div><ion-icon name="home-outline"></ion-icon><span>Home</span></div></a>
                                    <a href="#"><div><ion-icon name="person-outline"></ion-icon>Students</div></a>
                                    <a href="#"><div><ion-icon name="woman-outline"></ion-icon>Teachers</div></a>
                                    <a href="#"><div><ion-icon name="bookmark-outline"></ion-icon>Classes</div></a>
                                    <a href="#"><div><ion-icon name="book-outline"></ion-icon>Subjects</div></a>
                                    <a href="#"><div><ion-icon name="time-outline"></ion-icon>Time Table</div></a>
                                    <a href="#"><div><ion-icon name="alert-circle-outline"></ion-icon>Notices</div></a>

                                </div>

                                @endif

                                
                                @if(Qs::userIsTeamTe())
                                    <a href="#"><div><ion-icon name="home-outline"></ion-icon><span>Home</span></div></a>
                                    <a href="#"><div><ion-icon name="person-outline"></ion-icon>Students</div></a>
                                    <a href="#"><div><ion-icon name="woman-outline"></ion-icon>Teachers</div></a>
                                    <a href="#"><div><ion-icon name="bookmark-outline"></ion-icon>Classes</div></a>
                                    <a href="#"><div><ion-icon name="book-outline"></ion-icon>Subjects</div></a>
                                    <a href="#"><div><ion-icon name="time-outline"></ion-icon>Time Table</div></a>
                                    <a href="#"><div><ion-icon name="alert-circle-outline"></ion-icon>Notices</div></a>
                                @endif
                            
                                <a href='{{ url("/dashboard") }}'><div><ion-icon name="home-outline"></ion-icon><span>Home</span></div></a>
                                <a href="#"><div><ion-icon name="person-outline"></ion-icon>Students</div></a>
                                <a href="#"><div><ion-icon name="woman-outline"></ion-icon>Teachers</div></a>
                                <a href="#"><div><ion-icon name="bookmark-outline"></ion-icon>Classes</div></a>
                                <a href="#"><div><ion-icon name="book-outline"></ion-icon>Subjects</div></a>
                                <a href="#"><div><ion-icon name="time-outline"></ion-icon>Time Table</div></a>
                                <a href="#"><div><ion-icon name="alert-circle-outline"></ion-icon>Notices</div></a>
                                <a href="{{route('user.edit',[auth()->user()->id])}}"><div><ion-icon name="alert-circle-outline"></ion-icon>Profile</div></a>
                                <a href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                >
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                </form>
                                <div><ion-icon name="alert-circle-outline"></ion-icon>Logout</div></a>
                            
                        </div>
                        {{-- @if (isset($d))
                        <div class="col-4">
                        <div class="d-flex justify-content-center">
                            <div class="box mx-3 rounded">
                                <p class="classnum">{{$d->class}}</p>
                            </div>

                            <p class="classname">:{{$d->subject}}</p>
                        </div>
                        </div>
                        @endif --}}

                        <!-- notification -->
                        <div class="wrapper">
  <div class="navbar">
    

    <div class="navbar_right">
      <div class="notifications">
        <div class="icon_wrap"><i class="far fa-bell"></i></div>
         <div class="notification_dd">
            <ul class="notification_ul">
                <li class="starbucks success row">
                    <div class="notify_icon ">
                        <span class="icon"></span>  
                    </div>
                    <div class="notify_data col-sm-6">
                        <div class="title">
                            Lorem, ipsum dolor.  
                        </div>
                        <div class="sub_title">
                          Lorem ipsum dolor sit amet consectetur.
                      </div>
                    </div>
                    <div class="notify_status col-sm-3">
                        <p>Success</p>  
                    </div>
                </li>  
                <li class="starbucks success row">
                    <div class="notify_icon ">
                        <span class="icon"></span>  
                    </div>
                    <div class="notify_data col-sm-6">
                        <div class="title">
                            Lorem, ipsum dolor.  
                        </div>
                        <div class="sub_title">
                          Lorem ipsum dolor sit amet consectetur.
                      </div>
                    </div>
                    <div class="notify_status col-sm-3">
                        <p>Success</p>  
                    </div>
                </li> 
                <li class="starbucks success row">
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
                <li class="show_all">
                    <p class="link">Show All Activities</p>
                </li> 
            </ul>
        </div>
        
      </div>
      
    </div>
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
  </div>
  
</div>
                        <!-- End notification -->
                        
                    </div>
                </nav>
                <div class="container-fluid d-flex bd-highlight ">
                    <div class="p-2 flex-grow-1 bd-highlight">
                    <!-- <a href="{{ URL::previous() }}"><button type="button" class="btn btn-primary btn-sm">Go back</button></a> -->
                    <!-- <div class="alert " role="alert">
                        <span style="color:red">@error('grade_name'){{$message}}@enderror</span>
                    </div> -->
                    
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        @if(Session::has('message'))
            var type="{{Session::get('alert-type','info')}}"

            switch(type){
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
$(".profile .icon_wrap").click(function(){
  $(this).parent().toggleClass("active");
  $(".notifications").removeClass("active");
});

$(".notifications .icon_wrap").click(function(){
  $(this).parent().toggleClass("active");
   $(".profile").removeClass("active");
});

$(".show_all .link").click(function(){
  $(".notifications").removeClass("active");
  $(".popup").show();
});

$(".close, .shadow").click(function(){
  $(".popup").hide();
});
</script>
    <!-- Your application script -->


    @yield('script')
</body>

</html>

