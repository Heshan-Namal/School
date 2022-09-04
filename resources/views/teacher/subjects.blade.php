@extends('layouts.MasterDashboard')


@section('content')
<div class="content">
        <div class="row">
            @foreach($data as $key=>$sub)
            <div class="col-sm-3">
                <div class="card">
                    <a href="{{route('teacher.materials',[$sub->classid,$sub->subjectid])}}" style="text-decoration:none;">
                  <div class="card-body">
                    <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
                    <h2>{{$sub->class}}</h2>
                    <h3>{{$sub->subject}}</h3>
                    <div>
                      <!-- <p class="card-text">NO.of Teachers</p> -->
                    </div>
                  </div>
                </a>
                </div>
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



@endsection





