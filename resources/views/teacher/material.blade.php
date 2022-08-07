@foreach($detail as $key=> $d)
@extends('layouts.MasterDashboard')
@endforeach
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
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
<div class="row ">
    <div class="col-6 mt-3 bg">
        <div class="timetable text-center mb-4">Participation of All Assesment which you included</div>
        <div id="chart" style="height: 400px;"></div>
    </div>
    <div class="col-1"></div>
    <div class="col-5 bg px-2">
        <div class="timetable text-center mb-4">To Day Attentive Checks Participations</div>
        <div id="chart5" style="height: 400px;"></div>
    </div>


</div>

</div>

<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('participate_chart')"+ "?classid={{$classid}}" +"&subjectid={{$subjectid}}",
        hooks: new ChartisanHooks()
        .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                .datasets([{ type: 'line', fill: false,
            borderColor: "rgba(75,192,192,1)",}]),
        });


        const chart5 = new Chartisan({
      el: '#chart5',
      url: "@chart('today_attentive_chart')"+ "?classid={{$classid}}" +"&subjectid={{$subjectid}}",
      hooks: new ChartisanHooks()
        .datasets('doughnut')
        .pieColors(['#00FFEF','#4666FF','#0047AB']),
        });

  </script>
@endsection
