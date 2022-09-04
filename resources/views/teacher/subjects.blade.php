@extends('layouts.MasterDashboard')


@section('content')
<div class="content">
        <div class="row">
            @foreach($data as $key=>$sub)
            <div class="col-sm-3">
                <div class="card" id="subject_card">
                    <a href="{{route('teacher.materials',[$sub->classid,$sub->subjectid])}}" style="text-decoration:none;">
                  <div class="card-body">
                    <img id="myImg" src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
                    <h2>{{$sub->class}}</h2>
                    <h3>{{$sub->subject}}</h3>
                  </div>
                </a>
                </div>
              </div>
              @endforeach
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
                divs[i].children[0].getElementById("myImg").src="url('{{asset('assets/front/images/avatars/teacher.png')}}')";
                //divs[i].children[0].style.backgroundPosition= "50% 10%";
                //divs[i].children[0].style.backgroundRepeat="no-repeat";
                //divs[i].children[0].style.backgroundSize="80% 75%";
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
                divs[i].children[0].style.backgroundSize="80% 75%";
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
                divs[i].children[0].style.backgroundSize="80% 75%";
                break;

            case "art":
                divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/art.jpg')}}')";
                divs[i].children[0].style.backgroundPosition= "50% 10%";
                divs[i].children[0].style.backgroundRepeat="no-repeat";
                divs[i].children[0].style.backgroundSize="80% 75%";
                break;

            case "music":
                divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/music.jpg')}}')";
                divs[i].children[0].style.backgroundPosition= "50% 10%";
                divs[i].children[0].style.backgroundRepeat="no-repeat";
                divs[i].children[0].style.backgroundSize="80% 75%";
                break;

            case "dancing":
                divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/dancing.jpg')}}')";
                divs[i].children[0].style.backgroundPosition= "50% 10%";
                divs[i].children[0].style.backgroundRepeat="no-repeat";
                divs[i].children[0].style.backgroundSize="80% 75%";
                break;

            case "roman-catholic":
                divs[i].children[0].style.backgroundImage="url('{{asset('assets/front/images/student_img/art.jpg')}}')";
                divs[i].children[0].style.backgroundPosition= "50% 10%";
                divs[i].children[0].style.backgroundRepeat="no-repeat";
                divs[i].children[0].style.backgroundSize="80% 75%";
                break;


        }
    }

</script>



@endsection





