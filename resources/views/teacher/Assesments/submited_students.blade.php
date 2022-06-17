@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-3">
        <div class="sub-card">
            <div class="card-body">
                <p class="timetable">NO Students submited Assesment</p>
            </div>
        </div>
        </div>
        <div class="col-3">
            <div class="sub-card">
                <div class="card-body">
                    <p class="timetable">NO Students Late Submissions</p>
                </div>
            </div>
            </div>
            <div class="col-3">
                <div class="sub-card">
                    <div class="card-body">
                        <p class="timetable">Not add marks for Submission</p>
                    </div>
                </div>
                </div>
                <div class="col-3">
                    <div class="sub-card">
                        <div class="card-body">
                            <p class="timetable">NO Students not submited Assesment</p>
                        </div>
                    </div>
                    </div>
    </div>
</div>


    {{-- <div class="row">
        <div class="col-8">

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
  <td><a href="#"><button class="btn btn-primary btn-sm">View</button></a> </td>
</tr>

@endforeach



@else
<p>No Assesments assign yet</p>
@endif

</tbody>
</table>
</div>


        </div>
        <div class="col-8">

        </div>
    </div>--}}
@endsection
