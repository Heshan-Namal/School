@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')

<div class="container_AssStudent">
    <div class="row d-flex justify-content-evenly mb-5">
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
                        Attentiveness Checks scheduled for today
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
                            Percentage of total Responses for Attentiveness Checks today
                            @if (($std!=0) && ($count!=0))
                                <p>{{ number_format($at * 100 / ($std * $count) , 2) }}%</p>
                            @else
                                <p>No Attentiveness Checks</p>
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
                                Percentage of total Results for Attentiveness Checks today
                                @if (($std!=0) && ($count!=0))
                                <p>{{ number_format($r / ($std * $count) , 2) }}%</p>
                                @else
                                <p>No Attentiveness Checks</p>
                                @endif
                            </p>
                          </div>
                        </div>
                      </div>

                </div>
                </div>
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

<header>Attentiveness Checks published today :-</header>
    <div class="row">
        <div class="col-8">
@if($quizes->count()>0)
<div class="table-card mt-5">
    <table class="table table-bordered table-striped">
            <thead>

            <tr>
              <th>#</th>
              <th>Title</th>
              <th>Date</th>
              <th>Published Time</th>
              <th>Duration</th>
              <th>Responses</th>
              <th>Percentage of total Responses</th>
              <th></th>


            </tr>
            </thead>
            <tbody>


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
              <td><a href="{{route('attentive-submit',[$q->id])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View</button></a></div>
              </td>
            </tr>

            @endforeach
            @else
            <div class="d-flex justify-content-center mb-5">
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

    </tbody>
</table>
</div>


</div>
<div class="col-4">
    <header class ="mb-3">Highest Marks for each Attentiveness Check published today</header>
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th>Title</th>
                <th>Marks</th>
                <th>Published Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hmark as $key=> $h)
                <tr>
                    <td>{{$h->title}}</p></td>
                    <td>{{$h->max}}</p></td>
                    <td>{{$h->uploaded_time}}</p></td>
                </tr>
            @endforeach
        </tbody>
    </table>
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
