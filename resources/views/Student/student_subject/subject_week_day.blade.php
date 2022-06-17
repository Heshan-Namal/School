@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="d-flex justify-content-beween ">
        <div class="col-sm-4">
            <div class="day-card">
                <div class="card-header day-card-header">
                    <span>Monday</span>
                </div>
                <div class="day-card-body">
                    <div class="row row-col-2 justify-content-evenly">
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="link-outline"></ion-icon><span class="row justify-content-center">Link</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.quizlist',[$class_id,$subject_id,$term_id,$week_id,'monday'])}}">
                                <div class="option-icon col">
                                    <ion-icon name="newspaper-outline"></ion-icon><span class="row justify-content-center">Quiz</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.homeworklist',[$class_id,$subject_id])}}">
                                <div class="option-icon col">
                                    <ion-icon name="library-outline"></ion-icon><span class="row justify-content-center">Resources</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="person-outline"></ion-icon><span class="row justify-content-center">Attendance</span>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="day-card">
                <div class="card-header day-card-header">
                    <span>Tuesday</span>
                </div>
                <div class="day-card-body">
                    <div class="row row-col-2 justify-content-evenly">
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="link-outline"></ion-icon><span class="row justify-content-center">Link</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.quizlist',[$class_id,$subject_id,$term_id,$week_id,'tuesday'])}}">
                                <div class="option-icon col">
                                    <ion-icon name="newspaper-outline"></ion-icon><span class="row justify-content-center">Quiz</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.homeworklist',[$class_id,$subject_id])}}">
                                <div class="option-icon col">
                                    <ion-icon name="library-outline"></ion-icon><span class="row justify-content-center">Resources</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="person-outline"></ion-icon><span class="row justify-content-center">Attendance</span>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="day-card">
                <div class="card-header day-card-header">
                    <span>Wednesday</span>
                </div>
                <div class="day-card-body">
                    <div class="row row-col-2 justify-content-evenly">
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="link-outline"></ion-icon><span class="row justify-content-center">Link</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.quizlist',[$class_id,$subject_id,$term_id,$week_id,'wednesday'])}}">
                                <div class="option-icon col">
                                    <ion-icon name="newspaper-outline"></ion-icon><span class="row justify-content-center">Quiz</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.homeworklist',[$class_id,$subject_id])}}">
                                <div class="option-icon col">
                                    <ion-icon name="library-outline"></ion-icon><span class="row justify-content-center">Resources</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="person-outline"></ion-icon><span class="row justify-content-center">Attendance</span>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br>

    <div class="d-flex justify-content-center">

        <div class="col-sm-4">
            <div class="day-card">
                <div class="card-header day-card-header">
                    <span>Thursday</span>
                </div>
                <div class="day-card-body">
                    <div class="row row-col-2 justify-content-evenly">
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="link-outline"></ion-icon><span class="row justify-content-center">Link</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.quizlist',[$class_id,$subject_id,$term_id,$week_id,'thursday'])}}">
                                <div class="option-icon col">
                                    <ion-icon name="newspaper-outline"></ion-icon><span class="row justify-content-center">Quiz</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.homeworklist',[$class_id,$subject_id])}}">
                                <div class="option-icon col">
                                    <ion-icon name="library-outline"></ion-icon><span class="row justify-content-center">Resources</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="person-outline"></ion-icon><span class="row justify-content-center">Attendance</span>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-sm-4">
            <div class="day-card">
                <div class="card-header day-card-header">
                    <span>Friday</span>
                </div>
                <div class="day-card-body">
                    <div class="row row-col-2 justify-content-evenly">
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="link-outline"></ion-icon><span class="row justify-content-center">Link</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.quizlist',[$class_id,$subject_id,$term_id,$week_id,'friday'])}}">
                                <div class="option-icon col">
                                    <ion-icon name="newspaper-outline"></ion-icon><span class="row justify-content-center">Quiz</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="{{route('Student.student.homeworklist',[$class_id,$subject_id])}}">
                                <div class="option-icon col">
                                    <ion-icon name="library-outline"></ion-icon><span class="row justify-content-center">Resources</span>
                                </div>
                            </a></div>
                        <div class="col-sm-6 py-4"><a href="#">
                                <div class="option-icon col">
                                    <ion-icon name="person-outline"></ion-icon><span class="row justify-content-center">Attendance</span>
                                </div>
                            </a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection