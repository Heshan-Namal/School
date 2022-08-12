@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')

<div class="container_AssStudent">
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
                        Total No. of Students in the Class
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
                            Percentage of Responses
                            @if ($std!=0)
                            <p>{{ number_format($p->count / $std * 100, 2) }}%</p>
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
                            src="{{asset('assets/front/images/ass/s_a2.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Absent Students - No Response
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
                                    Attentiveness Percentage of the Class
                                    @if ($std!=0)
                                    <p>{{ number_format($sum->sum /$nums, 2) }}%</p>
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

    <header>Attentiveness Check Response Details</header>

    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
    @endif
    <form action="?" class="col-sm-2 me-auto" >
    <div class="col-12">
        <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
    </div>
    </form>

    <div class="row ">
        <div class="col-8">
@if($sub->count()>0)

<div class="table-card mt-2">
    <table class="table table-bordered table-striped">

            <thead>
            <tr>
              <th >#</th>
              <th>Admission No.</th>
              <th>Student Name</th>
              <th>Submited Time</th>
              <th><span data-bs-toggle="tooltip" title="red(<50)">Marks</span></th>
            </tr>
            </thead>
            <tbody>


        @foreach($sub as $key=> $s)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$s->admision_no}}</td>
              <td>{{$s->name}}</td>
              <td>{{ \Carbon\Carbon::parse($s->created_at)->format('h:m:s') }}</td>
              @if ($s->marks<50)
              <td style="color: #FF0000 ; text-align:center">{{$s->marks}}</td>
              @else
              <td style="color: #2c0379;text-align:center">{{$s->marks}}</td>
              @endif
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
<div class="pagination justify-content-end mt-3">
    {!! $sub->links() !!}
</div>
</div>
</div>


<div class="col-4">
    <header class ="mb-3">Top 10 Marks in the Class:-</header>
    <table class="table table-success table-striped table-hover">
        <thead>
            <tr>
                <th>Admission No.</th>
                <th>Name</th>
                <th>Marks</th>
                <th>Responded Time</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hm as $key=> $h)
                <tr>
                    <td>{{$h->admission_no}}</td>
                    <td>{{$h->full_name}}</td>
                    <td>{{$h->total_points}}</td>
                    <td>{{ \Carbon\Carbon::parse($h->uploaded_time)->format('h:m:s') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<script src="{{asset('assets/front/js/subass.js')}}"></script>
@endsection
