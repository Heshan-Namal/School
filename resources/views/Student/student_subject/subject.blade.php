@foreach($data as $s)
@extends('layouts.student_material')
@endforeach
@section('content')
    <section>
    <div ><p>Today is {{ Carbon\Carbon::now()->format('y-m-d') }} </p>
    </div>
    <!--container-->
    <div class="container-fluid pb-4">
        <br>
        @foreach($data as $key=>$item)
        <div class="card card-body text-center h2 mx-4">
            {{$item->name}}
        </div>
        @break;
        @endforeach
        <div class="row row-cols-3 p-4">
            <div class="col">
                <a href="{{route('student.quizlist',[$class_id,$subject_id])}}" style="text-decoration: none;">
                   <div class="card text-center" style="height: 24rem">
                        <img src="{{asset('assets/front/images/dogs/image3.jpeg')}}" class="h-75 card-img " alt="..." >
                        <span class="my-auto h4">Quizzes</span></div>
                </a>
            </div>

            <div class="col">
                <a href="{{route('student.homeworklist',[$class_id,$subject_id])}}" style="text-decoration: none;">
                    <div class="card text-center col" style="height:  24rem">
                    <img src="{{asset('assets/front/images/dogs/image2.jpeg')}}" class="h-75 card-img " alt="..." >
                    <span class="my-auto h4">Home work</span></div>
                </a>
            </div>

            <div class="col">
                <a href="{{route('student.Recordinglist',[$class_id,$subject_id])}}" style="text-decoration: none;">
                    <div class="card text-center col" style="height:  24rem">
                        <img src="{{asset('assets/front/images/dogs/image3.jpeg')}}" class="h-75 card-img " alt="..." >
                        <span class="my-auto h4">Recordings</span>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <script>
        const imgs=['{{asset('assets/front/images/student_img/english.jpg')}}','{{asset('assets/front/images/student_img/history.jpg')}}','{{asset('assets/front/images/student_img/maths.jpg')}}','{{asset('assets/front/images/student_img/science.jpg')}}'];
         
            const index = colors.indexOf(color);
            if (index > -1) {
              colors.splice(index, 1);
            }
    </script>
    </section>
@endsection