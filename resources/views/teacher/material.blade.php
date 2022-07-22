@foreach($detail as $key=> $d)
@extends('layouts.MasterDashboard')
@endforeach
@section('content')
<div class="content">

<div class="row">
  <div class="col-sm-3">
    <div class="card">
        <a href="{{route('ass.index',[$classid,$subjectid])}}" style="text-decoration:none;">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
         <h2 class="card-title fw-bold">ADD</h2>
        <div>
          <p class="card-text">Assesment</p>
        </div>
      </div>
        </a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
        <a href="{{route('quiz.index',[$classid,$subjectid])}}" style="text-decoration:none;">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">ADD</h2>
        <div>
        <p class="card-text">Attentive Quizes</p>
        </div>
      </div>
        </a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
        <a href="{{route('res.index',[$classid,$subjectid])}}" style="text-decoration:none;">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">ADD</h2>
        <div>
          <p class="card-text">Resourses </p>
        </div>
      </div>
        </a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
        <a href="#" style="text-decoration:none;">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">VIEW</h2>
        <div>
          <p class="card-text">Class Timetable </p>
        </div>
      </div>
        </a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
        <a href="{{route('class.recordbook',[$classid,$subjectid])}}" style="text-decoration:none;">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/teacher.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">ADD</h2>
        <div>
          <p class="card-text">Subject RecordBook</p>
        </div>
      </div>
        </a>
    </div>
  </div>
  <div class="col-sm-3">
    <div class="card">
        <a href="{{route('class.students',[$classid,$subjectid])}}" style="text-decoration:none;">
      <div class="card-body">
        <img src="{{asset('assets/front/images/avatars/student.png')}}" class="rounded mx-auto d-block" alt="...">
        <h2 class="card-title fw-bold">VIEW</h2>
        <div>
          <p class="card-text"> My Students</p>
        </div>
      </div>
        </a>
    </div>
  </div>



</div>
</div>
@endsection

