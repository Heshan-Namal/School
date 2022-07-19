@extends('layouts.MasterDashboard')

@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row">
        <h1 class="card-text">Welcome Teacher</h1>
    </div>

    <div class="row">
        <div class="col-3 mx-3">
            <div class="d-card  mt-3 ">
                <h4 class="card-header card-text colo d-flex justify-content-center">Leader Board</h4>
                <div class="row">
                    <form action="{{route('lead.index')}}" method="GET" class="form-inline">@csrf
                        <label for="min" class="card-text">From :</label>
                        <input type="Date" class="form-control d-in" name="mindata" required>
                        <label for="max" class="card-text">To :</label>
                        <input type="Date" class="form-control d-in" name="maxdata" required>
                        <button class="btn btn-primary" type="submit">Save</button>
                    </form>
                </div>
                <div class="row">
                    <div class="t-card overflow-auto">
                    <div class="card-body ">
                        <table class="table p-2 "><tr><th scope="col">Class Name</th><th scope="col">Assesment Name</th><th scope="col">Highest Marks</th></tr>
                      @foreach($leaders as $key=> $l)
                        <tr>
                        <td><p class="mx-2">{{$l->class_name}}</p></td>
                        <td><p class="mx-2">{{$l->title}}</p></td>
                        <td><p class="mx-2">{{$l->max}}</p></td>
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

    </div>
        <div class="col-8">
            <div class="row">
        <div class="dash-card">
        <div class="col-12">
            <div class="owl-carousel featured-carousel owl-theme">
                @foreach($data as $key=>$sub)
                <a href="{{route('teacher.materials',[$sub->classid,$sub->subjectid])}}" style="text-decoration:none;">
                <div class="item">
                    <div class="caro-box">
                        <div class="row g-0">
                            <div class="col-md-4 mt-3">
                              <img
                                src="{{asset('assets/front/images/ass/ma.jpg')}}"
                                alt="Trendy Pants and Shoes"
                                class="img-fluid rounded-start d-flex mx-2"
                              />
                            </div>
                            <div class="col-md-8">
                              <div class="card-body">
                                <p class="card-text">
                                    {{$sub->class}}<br>
                                    {{$sub->subject}}
                                </p>
                              </div>
                            </div>
                          </div>

                </div>
            </div>
                </a>
            @endforeach

        </div>

    </div>
    </div>
            </div>
            <div class="row">
                <div class="week-card mt-3 ">
                    <h4 class="card-header colo card-text d-flex justify-content-center">Weekly Activity</h4>
                    <div class="row my-4">
                    <div class="col-3">
                        <select name="term" id="term" class="form-control d-in">
                              <option value="term1" class="card-text" selected>All classes</option>
                              <option value="term2">term 2</option>
                              <option value="term3">term 3</option>
                        </select>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4">
                            <p>djchdcv dscbuicv jvdud edsves  e evwsrb</p>
                        </div>
                        <div class="col-4">
                            <p>djchdcv dscbuicv jvdudayvuy wiiusbvbv9wrvbjfvbu</p>
                        </div>
                        <div class="col-4">
                            <p>djchdcv dscbuicv jvdudjgdcve sdvcjshdcirg sbdcvyerov eisbiuevr</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>


</div>
<div class="row">
    <h3 class="card-text">Teaching</h3>
</div>
<div class="row hh mb-5">
    <div class="col-3">
    <div class="sub-card">
        <div class="card-header cd-head">Assign Attentive Checks</div>
        <div class="row g-0">
            <div class="col-md-4 mt-3">
              <img
                src="{{asset('assets/front/images/ass/d4.png')}}"
                alt="Trendy Pants and Shoes"
                class="img-fluid rounded-start d-flex mx-5"
              />
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <p class="card-text">
                    Numer of Students submit Assesment


                </p>
              </div>
            </div>
          </div>

    </div>
    </div>
    <div class="col-3">
        <div class="sub-card">
            <div class="card-header cd-head">Assign Resources</div>
            <div class="row g-0">
                <div class="col-md-4 mt-3">
                  <img
                    src="{{asset('assets/front/images/ass/d2.png')}}"
                    alt="Trendy Pants and Shoes"
                    class="img-fluid rounded-start d-flex mx-5"
                  />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text">
                      Num Students Late Submissions


                    </p>
                  </div>
                </div>
              </div>
        </div>
        </div>
        <div class="col-3">
            <div class="sub-card">
                <div class="card-header cd-head">Assign Assesments</div>
                <div class="row g-0">
                    <div class="col-md-4 mt-3">
                      <img
                        src="{{asset('assets/front/images/ass/d3.png')}}"
                        alt="Trendy Pants and Shoes"
                        class="img-fluid rounded-start d-flex mx-5"
                      />
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                        <p class="card-text">
                           Not add marks for Submission


                        </p>
                      </div>
                    </div>
                  </div>

            </div>
            </div>
            <div class="col-3">
                <div class="sub-card">
                    <div class="card-header cd-head">Student performance</div>
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/d1.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-5"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Num Students not submited Assesment
                               <span class="value rounded-circle ms-5">

                            </span>
                            </p>
                          </div>
                        </div>
                      </div>

                </div>
                </div>
</div>
<div class="row">
    <div class="col-5"></div>
    <div class="col-7">
        <img
            src="{{asset('assets/front/images/ass/dpic1.jpg')}}"
            alt="Trendy Pants and Shoes"
            class="img-fluid rounded-start d-flex imgk "
            />
    </div>
</div>
</div>
@endsection
