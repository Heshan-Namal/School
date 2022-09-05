@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/student.css')}}">

@endsection
@section('content')
<div class='content'>
<div class="row">
    <div class="accordion" id="accordionPanelsStayOpenExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="panelsStayOpen-headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                    Upcoming Classes
                </button>
            </h2>
            <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                <div class="accordion-body bg-light">
                    <div class="row"> 

                        <div id="carouselExampleCaptions" class="carousel carousel-dark slide mb-5" data-bs-ride="carousel">
                        
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row row-cols-4">
                                    @foreach($monday as $item)
                                    <div class="col-sm-3">
                                        <div id="subject_card" class="card">
                                            <div class="card-body hidden-div">
                                                    <div>
                                                        <p class="card-text fs-3"></p>
                                                        <p class="card-text fs-3">{{$item->subject_name}}</p>
                                                    </div>
                                                    <div class="hidden-button">
                                                        <a type="button" class="btn btn-primary" href="{{getTodayClassLink($item->id)}}" target="_blank">Join</a>
                                                    </div>
                                            </div>
                                            <div class="text-white period-text">{{$item->period}}</div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="carousel-caption d-none d-md-block">
                                    <span>Monday</span>
                                </div>
                            </div>
                            <div class="carousel-item">
                            <div class="row row-cols-4">
                                    @foreach($tuesday as $item)
                                    <div class="col-sm-3">
                                        <div id="subject_card" class="card">
                                            <div class="card-body hidden-div">
                                                    <div>
                                                        <p class="card-text fs-3"></p>
                                                        <p class="card-text fs-3">{{$item->subject_name}}</p>
                                                    </div>
                                                    <div class="hidden-button">
                                                        <a type="button" class="btn btn-primary" href="{{getTodayClassLink($item->id)}}" target="_blank">Join</a>
                                                    </div>
                                            </div>
                                            <div class="text-white period-text">{{$item->period}}</div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="carousel-caption d-none d-md-block">
                                <span>Tuesday</span>
                            </div>
                            </div>

                            <div class="carousel-item">
                            <div class="row row-cols-4">
                                    @foreach($wednesday as $item)
                                    <div class="col-sm-3">
                                        <div id="subject_card" class="card">
                                            <div class="card-body hidden-div">
                                                    <div>
                                                        <p class="card-text fs-3"></p>
                                                        <p class="card-text fs-3">{{$item->subject_name}}</p>
                                                    </div>
                                                    
                                                    <div class="hidden-button">
                                                        <a type="button" class="btn btn-primary" href="{{getTodayClassLink($item->id)}}" target="_blank">Join</a>
                                                    </div>
                                            </div>
                                            <div class="text-white period-text">{{$item->period}}</div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="carousel-caption d-none d-md-block">
                                <span>Wednesday</span>
                            </div>
                            </div>

                            <div class="carousel-item">
                            <div class="row row-cols-4">
                                    @foreach($thursday as $item)
                                    <div class="col-sm-3">
                                        <div id="subject_card" class="card">
                                            <div class="card-body hidden-div">
                                                    <div>
                                                        <p class="card-text fs-3"></p>
                                                        <p class="card-text fs-3">{{$item->subject_name}}</p>
                                                    </div>
                                                    <div class="hidden-button">
                                                        <a type="button" class="btn btn-primary" href="{{getTodayClassLink($item->id)}}" target="_blank">Join</a>
                                                    </div>
                                            </div>
                                            <div class="text-white period-text">{{$item->period}}</div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="carousel-caption d-none d-md-block">
                                <span>Thursday</span>
                            </div>
                            </div>

                            <div class="carousel-item">
                            <div class="row row-cols-4">
                                    @foreach($friday as $item)
                                    <div class="col-sm-3">
                                        <div id="subject_card" class="card">
                                            <div class="card-body hidden-div">
                                                    <div>
                                                        <p class="card-text fs-3"></p>
                                                        <p class="card-text fs-3">{{$item->subject_name}}</p>
                                                    </div>
                                                    <div class="hidden-button">
                                                        <a type="button" class="btn btn-primary" href="{{getTodayClassLink($item->id)}}" target="_blank">Join</a>
                                                    </div>
                                            </div>
                                            <div class="text-white period-text">{{$item->period}}</div>
                                        </div>
                                        </div>
                                    @endforeach
                                </div>
                            <div class="carousel-caption d-none d-md-block">
                                <span>Friday</span>
                            </div>
                            </div>
                        </div>




                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="3" aria-label="Slide 4"></button>
                            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="4" aria-label="Slide 5"></button>
                        </div>

                        </div>
                    
                    </div>
                </div>
            </div>


            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseTwo" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        Up Coming Quizzes
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseTwo" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="table-card">
                            <div class="card-body">
                                <table class="table table-primary table-hover table-striped ">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Due date</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($upcoming_quizzes as $key => $item)
                                        <tr>
                                            <th scope="row">{{$key+1}}</th>
                                            <td>{{$item->title}}</td>
                                            <td>{{$item->description}}</td>
                                            <td>{{$item->due_date}}</td>
                                                <td><a href="{{route('Student.student.showQuiz',$item->id)}}" target="_blank"><button type="button" class="btn btn-primary">View</button></a></td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header" id="panelsStayOpen-headingThree">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseThree" aria-expanded="false" aria-controls="panelsStayOpen-collapseThree">
                        Upcoming Assessments
                    </button>
                </h2>
                <div id="panelsStayOpen-collapseThree" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingThree">
                    <div class="accordion-body">
                    <div class="table-card">
                            <div class="card-body">
                                <table class="table table-primary table-hover table-striped ">
                                    <thead>
                                        <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col">Due date</th>
                                        <th scope="col">Assignment File</th>
                                        <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($upcoming_assignments as $key => $item)
                                            <tr>
                                                <th scope="row">{{$key+1}}</th>
                                                <td>{{$item->title}}</td>
                                                <td>{{$item->description}}</td>
                                                <td>{{$item->due_date}}</td>
                                                <td><a href="http://127.0.0.1:8000/assignments/{{$item->assessment_file}}" target="_blank">{{$item->assessment_file}}</a></td>
                                                <td><a href="{{route('Student.student.uploadHomework',[$item->class_id,$item->subject_id,$item->id])}}" target="_blank"><button type="button" class="btn btn-primary">View</button></a></td>
                                            </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script>
        var divs = document.querySelectorAll("#subject_card");
        console.log(divs);
        for(var i=0;i<divs.length;i++){
            var subject = divs[i].children[0].children[0].children[1].innerHTML;
            subject.trim();
            var s= subject.toLowerCase();
            console.log(s);
            switch(s){
                case "science":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/science.png')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    break;

                case "english":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/english.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    break;

                case "mathematics":
                case "maths":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/maths2.png')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    break;  

                case "history":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/history.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 100%";
                    break;

                case "sinhala":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/sinhala.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    break;

                case "buddhism":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/buddhism.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 95%";
                    break;

                case "art":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/art.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    break;

                case "ict":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/ict.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 85%";
                    break;

                case "tamil":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/tamil.png')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    break;

                case "health":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/health.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 85%";
                    break;


            }
        }
            
    </script>
    @endsection