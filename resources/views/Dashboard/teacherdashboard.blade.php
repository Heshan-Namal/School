@extends('layouts.MasterDashboard')
@section('style')

<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')

<div class="content">
    <div class="row">
        <h1 class="card-text">Welcome (Teacher)!</h1>
    </div>

    <div class="row">
        <div class="col-3 mx-3">
            <div class="d-card  mt-3 ">
                <h4 class="card-header card-text colo d-flex justify-content-center">Completed Assesments</h4><br>
                <div class="row mx-2">
                    <form action="{{route('dashboard')}}" method="GET" class="form-inline">@csrf<br>
                        <label for="min" class="card-text">From:<input type="Date" class="form-control d-in" name="mindata" required></label><br>
                        <label for="max" class="card-text">To:<input type="Date" class="form-control d-in" name="maxdata" required></label><br>
                        <button class="btn btn-primary mx-4" type="submit">Check</button>
                    </form>
                </div>
                <div class="row">
                    <div class="t-card overflow-auto">
                    <div class="card-body ">
                        <table class="table p-2 "><tr><th scope="col">Class</th><th scope="col">Assesment</th><th scope="col">Highest Marks Obtained</th></tr>
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
                    <h4 class="card-header colo card-text d-flex justify-content-center">Status Tracker</h4>
                    <div class="row my-4">
                        <div class="timetable" style="font-size: 20px">Never lose track of the work you do...</div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                                <p style="color: black">No. of Classes You Teach</p>
                                <p class="num">{{$cc}}</p>
                        </div>
                        <div class="col-4">
                            <p style="color: black">Attentive Checks in Drafts</p>
                            <p class="num">{{$ac}}</p>
                        </div>
                        <div class="col-4">
                            <p style="color: black">No. of Due Assessments</p>
                            <p class="num">{{$nc}}</p>
                        </div>
                    </div>
                </div>
            </div>
    </div>


</div>
<div class="row">
    <h3 class="card-text"><br>Teaching</h3>
</div>
<div class="row hh mb-5">
    <div class="col-3">
    <div class="front-card">
        <div class="card-header cd-head">Attentiveness Check</div>
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
                <p class="card-text">Create Attentiveness Checks for each period you teach.</p>
              </div>
            </div>
          </div>

    </div>
    </div>
    <div class="col-3">
        <div class="front-card">
            <div class="card-header cd-head">Subject Resources</div>
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
                    <p class="card-text">Provide students with class notes, reference links, and online meeting links for virtual lessons.</p>
                  </div>
                </div>
              </div>
        </div>
        </div>
        <div class="col-3">
            <div class="front-card">
                <div class="card-header cd-head">Student Assessment</div>
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
                        <p class="card-text">Assign your students written assessments or MCQ quiz-type assessments with strict deadlines.</p>
                      </div>
                    </div>
                  </div>

            </div>
            </div>
            <div class="col-3">
                <div class="front-card">
                    <div class="card-header cd-head">Record Book</div>
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
                            <p class="card-text">Update the Subject Record Book after every period.<span class="value rounded-circle ms-5"></span></p>
                          </div>
                        </div>
                      </div>

                </div>
                </div>
</div>
<div class="row mb-4">
    <div class="col-5 comment-card">
        <h4 class="table mt-5" style="color: rgb(12, 22, 110)">Classwise percentage of participation of students for assessment submissions.</h4>
        </div>
    <div class="col-7">
        <div id="chart3" style="height: 400px;"></div>
    </div>
</div>
<div class="row">
    <div class="col-7">
        <img
            src="{{asset('assets/front/images/ass/dpic1.jpg')}}"
            alt="Trendy Pants and Shoes"
            class="img-fluid rounded-start d-flex imgk "
            />
    </div>
    <div class="col-5 comment-card">
        <h3 class="table mt-5" style="color: rgb(12, 22, 110)">'Teaching is the highest form of understanding' <br> - Aristotle -</h3>
        </div>

</div>
</div>

<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<script>
const chart3 = new Chartisan({
    el: '#chart3',
    url: "@chart('classpres_chart')",
    hooks: new ChartisanHooks()
                .colors(['#797EF6','#4ADEDE','#1E2F97'])
                .datasets([{ type: 'line', fill: false,
            borderColor: "#797EF6",}]),
      });
</script>
@endsection
