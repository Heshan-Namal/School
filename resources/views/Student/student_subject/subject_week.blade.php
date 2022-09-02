@extends('layouts.MasterDashboard')
@section('content')
<div class="content">

    <div>

    </div>
   
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
                        <span class="h3 text-dark">Attentive Quizzes</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div id="chart"></div>

</div>

@endsection

@section('script')
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('participate_chart')"+ "?classid={{$class_id}}" +"&subjectid={{$subject_id}}",
        hooks: new ChartisanHooks()
        .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                .datasets([{ type: 'line', fill: false,
            borderColor: "rgba(75,192,192,1)",}]),
        });

  </script>

@endsection