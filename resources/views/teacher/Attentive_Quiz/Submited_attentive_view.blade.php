@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-3">
        <div class="box-card">
            <div class="card-body">
                <p class="timetable">ToDay Submited Attentiveness Checks</p>
                <p>{{$count}}</p>
            </div>
        </div>
        </div>
        <div class="col-3">
            <div class="box-card">
                <div class="card-body">
                    <p class="timetable">Overall Today Paricipation</p>
                    @if (($std!=0) && ($count!=0))
                    <p>{{ number_format($at * 100 / ($std * $count) , 2) }}%</p>
                    @else
                    <p> No checks </p>
                    @endif

                </div>
            </div>
            </div>
            <div class="col-3">
                <div class="box-card">
                    <div class="card-body">
                        <p class="timetable">Overall Today Result precentage</p>
                        @if (($std!=0) && ($count!=0))
                        <p>{{ number_format($r / ($std * $count) , 2) }}%</p>
                        @else
                        <p> No checks </p>
                        @endif

                    </div>
                </div>
                </div>
    </div>

    <div class="row">
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
              <th scope="col">Date</th>
              <th scope="col">Uploaded Time</th>
              <th scope="col">Duration</th>
              <th scope="col">Num of Submits</th>
              <th scope="col">precentage of Participation</th>
              <th scope="col"></th>


            </tr>
            </thead>
            <tbody>
                @if($quizes->count()>0)

                @foreach($quizes as $key=> $q)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$q->title}}</td>

              <td>{{$q->date}}</td>
              <td>{{$q->uploaded_time}}</td>
              <td>{{$q->quiz_duration}}</td>
              <td>{{$q->count}}</td>
              @if ($std!=0)
              <td>{{ number_format($q->count / $std * 100, 2) }}%</td>
              @else
              <td>None</td>
              @endif
              <td><a href="{{route('attentive-submit',[$q->id])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View </button></a></div>
              </td>
            </tr>

            @endforeach



            @else
            <p>No Assesments assign yet</p>
            @endif

    </tbody>
</table>
</div>
</div>
        <div class="col-4">
            <div class="d-card mt-3">
                <div class="card-header timetable">Highest Marks for an Assignmrnt</div>
                <div class="card-body">

                   <table><tr><th scope="col">Title</th><th scope="col">Marks</th><th>Uploaded Time</th></tr>
                 @foreach($hmark as $key=> $h)
                   <tr>
                   <td><p class="mx-4">{{$h->title}}</p></td>
                   <td><p class="mx-4">{{$h->max}}</p></td>
                   <td><p class="mx-4">{{$h->uploaded_time}}</p></td>
                   </tr>
                   {{-- <div class="row">
                    <div class="col-2">
                        <p>{{$n->title}}</p>
                    </div>
                    <div class="col-2">
                        <p>{{$n->due_date}}</p>
                    </div>
                   </div> --}}
    @endforeach
                   </table>
                </div>

            </div>

        </div>
</div>
<script src="{{asset('assets/front/js/subass.js')}}"></script>

@endsection
