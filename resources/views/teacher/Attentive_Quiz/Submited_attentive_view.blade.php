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
        <div class="col-8">

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
        <div class="col-4">
            <div class="d-card overflow-auto mt-5">
                <div class="card-header card-text">Highest Marks for an Assignmrnt</div>
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
</div>
<script src="{{asset('assets/front/js/subass.js')}}"></script>

@endsection
