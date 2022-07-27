
@extends('layouts.MasterDashboard')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row mb-5">
        <div class="col-3">
        <div class="sub-card">
            <div class="row g-0">
                <div class="col-md-4 mt-3">
                  <img
                    src="{{asset('assets/front/images/ass/s_a1.png')}}"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start d-flex mx-2"
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text">
                        Participate Students
                        <p>{{$nums}}</p>
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
                        src="{{asset('assets/front/images/ass/s_a3.png')}}"
                        alt="Trendy Pants and Shoes"
                        class="img-fluid rounded-start d-flex mx-2"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">
                            Participation precentage for lesson
                            @if ($std!=0)
                            <p>{{ number_format($p->count / $std * 100, 2) }}%</p>
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
                            src="{{asset('assets/front/images/ass/s_a2.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Absent minded Students
                                <p>{{$abs}}</p>
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
                                src="{{asset('assets/front/images/ass/s_a4.png')}}"
                                alt="Trendy Pants and Shoes"
                                class="img-fluid rounded-start d-flex mx-2"
                              />
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <p class="card-text">
                                    Knowledge prrecentage for lesson
                                    @if ($std!=0)
                                    <p>{{ number_format($sum->sum /$nums, 2) }}%</p>
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
    <div class="row mt-3">
        <div class="head mt-1">
            <p><u>Submitted Students Attentiveness Checks Details</u> :-</p>
        </div>
    </div>
    <div class="row d-flex justify-content-evenly">
        <div class="col-6">

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
              <th scope="col">Admision Num</th>
              <th scope="col">Student Name</th>
              <th scope="col">Submited Time</th>
              <th scope="col">marks</th>
            </tr>
            </thead>
            <tbody>
                @if($sub->count()>0)

                @foreach($sub as $key=> $s)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$s->admision_no}}</td>
              <td>{{$s->name}}</td>
              <td>{{ \Carbon\Carbon::parse($s->created_at)->format('h:m:s') }}</td>
              <td>{{$s->marks}}</td>




            </tr>

            @endforeach



            @else
            <p>No Assesments assign yet</p>
            @endif

    </tbody>
</table>
</div>
</div>
        <div class="col-4 at">
            <div class="d-card overflow-auto mt-3">
                <div class="card-header colo card-text">Highest Ten Marks In the Attentive Check</div>
                <div class="card-body">

                   <table class="table "><tr><th scope="col">Admision_No</th><th scope="col">Name</th><th scope="col">Marks</th><th scope="col">Submited Time</th></tr>
                 @foreach($hm as $key=> $h)
                   <tr>
                   <td><p class="mx-4">{{$h->admission_no}}</p></td>
                   <td><p class="mx-4">{{$h->full_name}}</p></td>
                   <td><p class="mx-4">{{$h->total_points}}</p></td>
                   <td><p class="mx-4">{{ \Carbon\Carbon::parse($h->uploaded_time)->format('h:m:s') }}</p></td>
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
