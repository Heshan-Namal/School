@extends('layouts.MasterDashboard')
@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
<div class="row hh">
    <div class="col-8">
        <div class="row">
        <div class="card">
            <form action="#" method="GET" class="form-inline">@csrf
            <div class="form-group row">
                <h4 class="timetable mb-2 mt-3">View Overdue Assessments</h4>
                    <div class="col-sm-3" >
                        <select name="term" id="term" onchange="getselector(this.value);" class="form-control">
                            <option value="" value="" disabled selected>Select Term</option>
                            <option value="allt" selected>All Terms</option>
                                <option value="term1">Term 1</option>
                                <option value="term2">Term 2</option>
                                <option value="term3">Term 3</option>

                        </select>
                    </div>
                <div class="col-sm-3">
                    <select name="week" id="week" onchange="getselector(this.value);" class="form-control ">
                        <option value="" value="" disabled selected>Select Week</option>
                            <option value="allw" selected >All Weeks</option>
                            <option value="week1">Week 1</option>
                            <option value="week2">Week 2</option>
                            <option value="week3">Week 3</option>
                            <option value="week4">Week 4</option>
                            <option value="week5">Week 5</option>
                            <option value="week6">Week 6</option>
                            <option value="week7">Week 7</option>
                            <option value="week8">Week 8</option>
                            <option value="week9">Week 9</option>
                            <option value="week10">Week 10</option>
                            <option value="week11">Week 11</option>
                            <option value="week12">Week 12</option>
                            <option value="extra">Extra Weeks</option>

                    </select>
                    </div>

                <div class="col-sm-3">
                <select name="day" id="day" class="form-control ">
                    <option value="" value="" disabled selected>Select Day</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wensday">Wednesday</option>
                        <option value="thursday">Thursday</option>
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
        {{-- <div class="row mb-4">
            <div class="col-4">
                <div class="box-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/subass1.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                               Late Submission Students

                            </p>
                          </div>
                        </div>
                      </div>

                </div>

            </div>
            <div class="col-4">
                <div class="box-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/subass2.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                In this week Expired Assesments

                            </p>
                          </div>
                        </div>
                      </div>

                </div>

            </div>
            <div class="col-4">
                <div class="box-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/no_pub.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Num of Students Notsubmit any Assesments

                            </p>
                          </div>
                        </div>
                      </div>

                </div>

            </div>
        </div> --}}
        <div class="row">
            <div class="head mt-4">
                <p><u>Submissions for Overdue Assessments</u> :-</p>
            </div>
            <div class="text-end">
                <form action="?" class="col-sm-2 me-auto" >
                    <div class="input-group">
                        <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
                        <button type="submit" class="btn btn-primary"> Go!</button>
                     </div>
                </form>
            </div>
            <div class="col-10">
                {{-- <div class="card-body"> --}}
                    @if (session('message'))
                        <div class="alert alert-success" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif

    <div class="table-card mt-2">
        <table class="table table-success table-hover m-0">
    <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Title</th>
      <th scope="col">Term</th>
      <th scope="col">Week</th>
      <th scope="col">Day</th>
      <th scope="col">Type</th>
      <th scope="col">Submissions</th>
      <th scope="col">View</th>

    </tr>
    </thead>
    <tbody id="myTable">
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
        {!! $assignments->links() !!}
        </div>
    </div>

                {{-- </div> --}}
            </div>
        </div>
        </div>
        <div class="col-4">
            <div class="d-card overflow-auto mt-3">
                <div class="card-header colo "><h5 class="timetable text-center">Submissions for Assessments with due date yet to arrive:-</h5></div>
                <div class="jj">
                <div class="card-body">
                    <table class="table "><tr><th scope="col" class="mx-2">Title</th><th scope="col">Due Date</th><th scope="col">Submissions</th></tr>
                    @foreach($nearas as $key=> $n)
                   <tr>
                   <td><p class="mx-3">{{$n->title}}</p></td>
                   <td><p class="mx-3 rounded-circle">{{$n->due_date}}</p></td>
                   <td><p class="mx-3 rounded-circle">{{$n->count}}</p></td>
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

    </div>

    <div class="row">
        <div class="col-8"></div>
        <div class="col-4">
            <div id="chart2" style="height: 400px;"></div>
        </div>
    </div>
</div>
<script src="https://unpkg.com/chart.js@^2.9.3/dist/Chart.min.js"></script>
<script src="https://unpkg.com/@chartisan/chartjs@^2.1.0/dist/chartisan_chartjs.umd.js"></script>
<script>
const chart2 = new Chartisan({
      el: '#chart2',
      url: "@chart('result_ass_chart')"+ "?classid={{$classid}}" +"&subjectid={{$subjectid}}",
      hooks: new ChartisanHooks()
        .colors(['#797EF6'])
                .datasets([{ type: 'bar', fill: true,
            borderColor: "rgba(75,192,192,1)",}]),
        });
</script>

@endsection
