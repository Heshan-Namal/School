@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
   
    <div class="row">
        <div class="col-sm-3">
            <a style="text-decoration: none" href="{{route('Student.student.homeworklist',[$class_id,$subject_id])}}">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/student_img/assessment.png')}}" class="rounded mx-auto d-block mb-3" alt="...">
                        <span class="h3 text-dark">Assessments</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a style="text-decoration: none" href="{{route('Student.student.resourcelist',[$class_id,$subject_id])}}">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/student_img/resource.png')}}" class="rounded mx-auto d-block mb-3" alt="...">
                        <span class="h3 text-dark">Resources</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a style="text-decoration: none" href="#">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/student_img/quiz.png')}}" class="rounded mx-auto d-block mb-3" alt="...">
                        <span class="h3 text-dark">Quizzes</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

</div>

@endsection

@section('script')
<script src="{{asset('assets/front/js/student/termSelection.js')}}"></script>
@endsection