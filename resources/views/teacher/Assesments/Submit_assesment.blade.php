@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/teacher.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
    <div class="row">
        <header class ="mb-3">View Overdue Assessments</header>
    <div class="row col-7">
        <div class="row g-3 mt-4 col-12 ">

            <form action="#" method="GET" class="row g-3">@csrf
                <div class="col-md-5">
                    <label for="inputState" class="form-label">Select Term</label>
                    <select name="term" id="term" onchange="getselector(this.value);"
                        class="form-control mt-3">
                        <option selected>Choose...</option>
                        <option value="allt">All Terms</option>
                        <option value="term1">First Term </option>
                        <option value="term2">Second Term </option>
                        <option value="term3">Third Term</option>
                    </select>
                </div>
                <div class="col-md-5" id="day1" hidden>
                    <label for="inputState" class="form-label">Select Date</label>
                    <select name="day" id="day" class="form-control mt-3"
                        aria-label="Default select example">
                        <option selected value="">Choose...</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wensday">Wednesday</option>
                        <option value="thursday">Thursday</option>
                        <option value="friday">Friday</option>
                    </select>
                </div>
                <div class="col-md-2">

                    <input type="submit" class="btn btn-primary mt-5 " name="submit" value="View">
                </div>
            </form>
        </div>

    <div class="row">
            <header>All Submissions for Overdue Assessments</header>
            <form action="?" >
        <div class="d-flex justify-content-end">
            <div class="col-4 mx-2">
                <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
            </div>
        </div>
            </form>
    </div>

    @if (session('message'))
    <div class="alert alert-success" role="alert">
        {{ session('message') }}
    </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif


    @if($assignments->count()>0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Term</th>
                <th>Published Week</th>
                <th>Published Day</th>
                <th>Assessment Type</th>
                <th>Submissions</th>
                <th>View</th>
            </tr>
        </thead>
        <tbody>
            @foreach($assignments as $key=> $a)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$a->title}}</td>
                <td>{{$a->term}}</td>
                <td>{{$a->week}}</td>
                <td>{{$a->day}}</td>
                <td>{{$a->assessment_type}}</td>
                <td>{{$a->count}}</td>
                <td><a href="{{route('submit.view',[$a->id])}}"><button class="btn btn-primary btn-sm">View</button></a> </td>

            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="pagination justify-content-end mt-3">
        {!! $assignments->links() !!}
    </div>
    @else
    <div class="d-flex justify-content-center mt-5">
      <div class="search-card">
          <div class="row"><h4 class="search-font ">Can't find any Records </h4></div>
          <div class="row d-flex justify-content-center">
              <div class="col-md-4 mt-3 ">
                  <img
                    src="{{asset('assets/front/images/ass/rec.png')}}"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start d-flex "
                  />
                </div>
          </div>
          </div>
    </div>
    @endif
    </div>

    <div class="col-5">
        <header class ="mb-3">Submissions for Assessments with due date yet to arrive:-</header>
        <table class="table table-success table-striped table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Due Date</th>
                    <th>Submissions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($nearas as $key=> $n)
                    <tr>
                        <td>{{$n->title}}</td>
                        <td>{{$n->due_date}}</td>
                        <td>{{$n->count}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="row mt-5">
            <div id="chart2" style="height: 400px;"></div>
        </div>
    </div>
    </div>



</div>
<script src="{{asset('assets/front/js/optionselector.js')}}"></script>
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<script>
const chart2 = new Chartisan({
      el: '#chart2',
      url: "@chart('result_ass_chart')"+ "?classid={{$classid}}" +"&subjectid={{$subjectid}}",
      hooks: new ChartisanHooks()
        .colors(['#797EF6'])
                .datasets([{ type: 'bar', fill: true,
            borderColor: "rgba(75,192,192,1)",}]),
        });
</script>
@endsection
