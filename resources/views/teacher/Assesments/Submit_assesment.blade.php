@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
<div class="row hh">
    <div class="col-8">
        <div class="row">
        <div class="card">
            <form action="#" method="GET" class="form-inline">@csrf
            <div class="form-group row">
                <h4 class="timetable mb-2 mt-3">Submited Assesments</h4>
                    <div class="col-sm-3" >
                        <select name="term" id="term" onchange="getselector(this.value);" class="form-control">
                            <option value="" value="" disabled selected>Select Term</option>
                            <option value="allt" selected>All terms</option>
                                <option value="term1">term 1</option>
                                <option value="term2">term 2</option>
                                <option value="term3">term 3</option>

                        </select>
                    </div>
                <div class="col-sm-3">
                    <select name="week" id="week" onchange="getselector(this.value);" class="form-control ">
                        <option value="" value="" disabled selected>Select Week</option>
                            <option value="allw" selected >All Weeks</option>
                            <option value="week1">week 1</option>
                            <option value="week2">week 2</option>
                            <option value="week3">week 3</option>
                            <option value="week4">week 4</option>
                            <option value="week5">week 5</option>
                            <option value="week6">week 6</option>
                            <option value="week7">week 7</option>
                            <option value="week8">week 8</option>
                            <option value="week9">week 9</option>
                            <option value="week10">week 10</option>
                            <option value="week11">week 11</option>
                            <option value="week12">week 12</option>
                            <option value="extra">extra weeks</option>

                    </select>
                    </div>

                <div class="col-sm-3">
                <select name="day" id="day" class="form-control ">
                    <option value="" value="" disabled selected>Select Day</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wensday">Wendsday</option>
                        <option value="thursday">Tursday</option>
                        <option value="friday">Friday</option>


                </select>

                </div>
                                    <div class="col-2">

                                        {{-- <button type="button" class="btn btn-success ">Success</button> --}}
                                        <input type="submit" class="btn btn-primary" name="submit" value="View">
                                        {{-- <div class="col-3"></div> --}}

                                    </div>


        </div>
            </form>
        </div>
        </div>
        <div class="row">
            <div class="col-4">
                <div class="box-card">
                    <div class="card-body">
                        <p class="timetable" >Late Submission Students</p>
                        <p class="text-end" >Published</p>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="box-card">
                    <div class="card-body">
                        <p class="timetable" >In this week Expired Assesments</p>
                        <p class="text-end" >Published</p>
                    </div>
                </div>

            </div>
            <div class="col-4">
                <div class="box-card">
                    <div class="card-body">
                        <p class="timetable" >Num of Students Notsubmit any Assesments</p>
                        <p class="text-end" >Published</p>
                    </div>
                </div>

            </div>
        </div>
        </div>
        <div class="col-4">
            <div class="d-card mt-3">
                <div class="card-header timetable">View Submited Assesments</div>
                <div class="card-body">
                   <table class="overflow-y:auto;">
                    <div class="card-header mx-4">
                        <tr><th>Title</th><th>Due Date</th><th>Num of Submits</th></tr>
                    </div>

                    @foreach($nearas as $key=> $n)
                   <tr>
                   <td><p class="mx-4">{{$n->title}}</p></td>
                   <td><p class="mx-4 rounded-circle">{{$n->due_date}}</p></td>
                   <td><p class="mx-4 rounded-circle">{{$n->count}}</p></td>
                   </tr>
                   @endforeach
                   {{-- <div class="row">
                    <div class="col-2">
                        <p>{{$n->title}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$n->due_date}}</p>
                    </div>
                   </div> --}}

                   </table>
                </div>

            </div>

        </div>

    </div>

    <div class="row">
        <div class="col-8">
            {{-- <div class="card-body"> --}}
                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
<div class="table-card mt-5">
    <table class="table table-success table-hover m-0">
<thead>
<tr>
  <th scope="col">#</th>
  <th scope="col">Title</th>
  <th scope="col">Term</th>
  <th scope="col">Week</th>
  <th scope="col">Day</th>
  <th scope="col">Type</th>
  <th scope="col">Count</th>
  <th scope="col">View</th>

</tr>
</thead>
<tbody>
@if($assignments->count()>0)

  @foreach($assignments as $key=> $a)
<tr>
  <th scope="row">{{$key+1}}</th>
  <td>{{$a->title}}</td>
  <td>{{$a->term}}</td>
  @if ($a->week==null)
      <td>{{$a->extra_week}}</td>
  @else
        <td>{{$a->week}}</td>
  @endif
  <td>{{$a->day}}</td>
  <td>{{$a->assessment_type}}</td>
  <td>{{$a->count}}</td>
  <td><a href="{{route('submit.view',[$a->id])}}"><button class="btn btn-primary btn-sm">View</button></a> </td>
</tr>

@endforeach



@else
<p>No Assesments assign yet</p>
@endif

</tbody>
</table>
</div>

            {{-- </div> --}}
        </div>
        <div class="col-8">

        </div>
    </div>
</div>
@endsection
