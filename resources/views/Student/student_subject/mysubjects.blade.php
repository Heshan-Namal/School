@extends('layouts.MasterDashboard')

@section('content')

    <div class="content">
        <div class="row text-center">
                <h2>My Subjects</h2>
        </div>
        <div class="row ">
            @foreach($data as $key=>$item)
            <div class="col-sm-3">
                <a style="text-decoration: none" href="{{route('Student.student.subject_week',[$item->class_id,$item->subject_id])}}">
               
                    <div id="img" class="card">
                        <div class="card-body">
                            <div>
                                <p class="card-text h4 py-2" style="background: linear-gradient(90deg, rgba(123,190,255,0.7990546560421043) 0%, rgba(0,212,255,0.5) 50%, rgba(91,210,255,0.8) 100%);" >{{$item->subject}}</p>
                            </div>
                        </div>
                    </div>
               
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        var divs = document.querySelectorAll("#img");

        console.log(divs);

        for(var i=0;i<divs.length;i++){
        var subject = divs[i].children[0].children[0].children[0].innerHTML;

        console.log(subject)
        subject.trim();
        var s= subject.toLowerCase();
            switch(s){
                case "science":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/science.png')}}')";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundSize="80% 75%";
                    
                    break;

                case "english":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/english.jpg')}}')";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
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
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;

                case "sinhala":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/sinhala.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;

                case "buddhism":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/buddhism.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;

                case "ict":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/ict.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;

                case "tamil":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/tamil.png')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;

                case "health":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/health.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;

                case "roman-catholic":
                    divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/art.jpg')}}')";
                    divs[i].children[0].style.backgroundPosition= "50% 10%";
                    divs[i].children[0].style.backgroundRepeat="no-repeat";
                    divs[i].children[0].style.backgroundSize="80% 80%";
                    break;


            }
        }

        // const index = colors.indexOf(color);
        //     if (index > -1) {
        //       colors.splice(index, 1);
        //     }
            
    </script>
    </section>
@endsection