@extends('layouts.MasterDashboard')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row d-flex justify-content-evenly">
        <div class="col-3 ">
        <div class="sub-card">
            <div class="row g-0">
                <div class="col-md-4 mt-3">
                  <img
                    src="{{asset('assets/front/images/ass/a1.png')}}"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start d-flex mx-2"
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text">
                        ToDay Submited Attentiveness Checks
                        <p>{{$count}}</p>
                    </p>
                  </div>
                </div>
              </div>

        </div>
        </div>
        <div class="col-3">
            <div class="sub-card">
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                      <img
                        src="{{asset('assets/front/images/ass/a2.png')}}"
                        alt="Trendy Pants and Shoes"
                        class="img-fluid rounded-start d-flex mx-2"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">
                            Overall Today Paricipation
                            @if (($std!=0) && ($count!=0))
                                <p>{{ number_format($at * 100 / ($std * $count) , 2) }}%</p>
                            @else
                                <p> No checks </p>
                            @endif
                        </p>
                      </div>
                    </div>
                  </div>

            </div>
            </div>
            <div class="col-3">
                <div class="sub-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/a3.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Overall Today Result precentage
                                @if (($std!=0) && ($count!=0))
                                <p>{{ number_format($r / ($std * $count) , 2) }}%</p>
                                @else
                                <p> No checks </p>
                                @endif
                            </p>
                          </div>
                        </div>
                      </div>

                </div>
                </div>
    </div>
    <div class="row">
        <div class="col-7">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif
    <div class="row mt-5">
        <div class="head mt-4">
            <p><u>Today Submitted Attentiveness Checks</u> :-</p>
        </div>
    </div>

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
<div class="col-4 mx-5">
    <div class="d-card overflow-auto mt-5">
        <div class="card-header colo card-text">Highest Marks for an Assignmrnt</div>
        <div class="card-body">
            <table class="table "><tr><th scope="col">Title</th><th scope="col">Marks</th><th scope="col">uploaded Time</th></tr>
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
<div class="row"></div>
<div class="row mt-3 mb-4">
    <div class="col-6 "><h4 class="timetable mt-4 text-center">Current Month Attentive checks that you include Summery as Precentage </h4></div>
    <div class="col-6"><div id="chart4" style="height: 400px;"></div></div>
</div>
</div>
<script src="{{asset('assets/front/js/subass.js')}}"></script>
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>

<script>


const chart4 = new Chartisan({
      el: '#chart4',
      url: "@chart('attentive_chart')"+ "?classid={{$classid}}" +"&subjectid={{$subjectid}}",
      hooks: new ChartisanHooks()
        .colors(['rgba(10,114,724,5)','#FE0045','#C07EF1','#67C560','#ECC94B'])
        // .datasets('doughnut')
        // .pieColors(),
        .datasets([{ type: 'bar', fill: false,
        borderColor: "['#4299E1','#FE0045','#C07EF1','#67C560','#ECC94B']",}]),

        });
</script>
@endsection
