@extends('layouts.student')

@section('content')
    <section>
    <div ><p>Today is {{ Carbon\Carbon::now()->format('y-m-d') }} </p>
    </div>
    <!--container-->
    <div class="container-fluid pb-4">
        <h2 class="text-center">My Subjects</h2><br>
        <div class="row row-cols-2">
            @foreach($data as $key=>$item)
            <div class="col">
                <a style="text-decoration: none" href="{{route('student.subject',[$item->class_id,$item->subject_id])}}">
                <div class="row text-center mb-3 me-3" id="img" style="height:10rem">
                    <div class="col-md-3 rounded-start bg-secondary position-relative">
                        <span class="text-white my-auto position-absolute top-50 start-50 translate-middle h6">{{$item->subject}}</span>
                    </div>
                    <div class="col-md-9 rounded-end"></div>
                </div>
                </a>
            </div>
            @endforeach
        </div>
    </div>
    <script>
        const colors=['#DFFF0055','#FFBF0055','#FF7F5055','#9FE2BF55','#6495ED55','#40E0D055','#DE316355','#CCCCFF55'];
        var divs = document.querySelectorAll("#img");


        for(var i=0;i<divs.length;i++){
        var subject = divs[i].children[0].children[0].innerHTML;
        subject.trim();
        var s= subject.toLowerCase();
            switch(s){
                case "science":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/science.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "english":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/english.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "mathematics":
                case "maths":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/maths.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;  

                case "history":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/history.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "sinhala":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/sinhala.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "buddhism":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/buddhism.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "art":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/art.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "music":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/music.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "dancing":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/dancing.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
                    break;

                case "roman-catholic":
                    divs[i].children[1].style.backgroundImage="url('{{asset('assets/front/images/student_img/art.jpg')}}')";
                    divs[i].children[1].style.backgroundRepeat="no-repeat";
                    divs[i].children[1].style.backgroundSize="100% 100%";
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