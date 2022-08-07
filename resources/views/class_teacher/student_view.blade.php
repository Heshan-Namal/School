@extends('layouts.MasterDashboard')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
        <div class="row">
            <div class="col-12">
            <div class="col-6 bg mb-3">
                <div class="timetable text-center mb-4">Attentive Check of All Subjects</div>
                <div id="chart" style="height: 400px;"></div>
            </div>
            <div class="col-6 bg mt-3">
                <div class="timetable text-center mb-4">Assesment marks precentage of All Subjects</div>
                <div id="chart2" style="height: 400px"></div>
            </div>
            </div>
        </div>
</div>
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script>
    const chart = new Chartisan({
      el: '#chart',
      url: "@chart('student_attentive_chart')"+ "?id={{$id}}",
        hooks: new ChartisanHooks()
        .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                .datasets([{ type: 'bar', fill: true,
            borderColor: "rgba(75,192,192,1)",}]),
        });
        const chart2 = new Chartisan({
      el: '#chart',
      url: "@chart('student_ass_chart')"+ "?id={{$id}}",
        hooks: new ChartisanHooks()
        .colors(['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B'])
                .datasets([{ type: 'bar', fill: true,
            borderColor: "rgba(75,192,192,1)",}]),
        });

  </script>
@endsection
