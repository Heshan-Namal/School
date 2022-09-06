@extends('layouts.MasterDashboard')

@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/student.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/card.css')}}">
@endsection

@section('content')
<div class="content">

    <div>

    </div>
    <div class="row text-center">
        @foreach($subject as $item)
        <h2>{{$item->subject_name}}</h2>
        @endforeach
    </div>

    <br>
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
            <a style="text-decoration: none" href="{{route('Student.student.AttentiveQuizList',[$class_id,$subject_id])}}">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/student_img/quiz.png')}}" class="rounded mx-auto d-block mb-3" alt="...">
                        <span class="h3 text-dark">Attentive Quizzes</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-sm-3">
            <a style="text-decoration: none" href="{{route('Student.student.recordBook',[$class_id,$subject_id])}}">
                <div class="card">
                    <div class="card-body">
                        <img src="{{asset('assets/front/images/student_img/recordBook.png')}}" class="rounded mx-auto d-block mb-3" alt="...">
                        <span class="h3 text-dark">Record Book</span>
                    </div>
                </div>
            </a>
        </div>

    </div>

    <div class="row">
        <div id="chart1" class="chart col"></div>
        <div id="chart2" class="chart col"></div>
    </div>
</div>

@endsection

@section('script')
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script>
    const chart = new Chartisan({
      el: '#chart1',
      url: "@chart('attentive_chart')"+ "?classid={{$class_id}}" +"&subjectid={{$subject_id}}",
      hooks: new ChartisanHooks()
        .colors(['rgba(10,114,724,5)','#FE0045','#C07EF1','#67C560','#ECC94B'])
        // .datasets('doughnut')
        // .pieColors(),
        .datasets([{ type: 'bar', fill: false,
        borderColor: "['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B']",}]),

        });

  </script>

<script>
const chart2 = new Chartisan({
      el: '#chart2',
      url: "@chart('result_ass_chart')"+ "?classid={{$class_id}}" +"&subjectid={{$subject_id}}",
      hooks: new ChartisanHooks()
        .colors(['#797EF6'])
                .datasets([{ type: 'bar', fill: true,
            borderColor: "rgba(75,192,192,1)",}]),
        });
</script>

@endsection