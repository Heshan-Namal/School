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
                <h4 class="timetable mb-2 mt-3">Uploded Attentive Quizes</h4>
                    <div class="col-sm-3" >
                        <select name="term" id="term" onchange="getselector(this.value);" class="form-control">
                            <option value="" value="" disabled selected>Select Term</option>
                            <option value="allt" selected>All terms</option>
                                <option value="term1">term 1</option>
                                <option value="term2">term 2</option>
                                <option value="term3">term 3</option>

                        </select>
                    </div>
                <div class="col-sm-3">
                    <select name="week" id="week" onchange="getselector(this.value);" class="form-control ">
                        <option value="" value="" disabled selected>Select Week</option>
                            <option value="allw" selected >All Weeks</option>
                            <option value="week1">week 1</option>
                            <option value="week2">week 2</option>
                            <option value="week3">week 3</option>
                            <option value="week4">week 4</option>
                            <option value="week5">week 5</option>
                            <option value="week6">week 6</option>
                            <option value="week7">week 7</option>
                            <option value="week8">week 8</option>
                            <option value="week9">week 9</option>
                            <option value="week10">week 10</option>
                            <option value="week11">week 11</option>
                            <option value="week12">week 12</option>
                            <option value="extra">extra weeks</option>

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
        <div class="row mb-5">
            <div class="col-4">
                <div class="box-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/q1.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Num of All Attentive Quizes
                                <p class="text-end" >{{$uplod}}</p>
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
                                Not Published Attentive Quizes
                                <p class="text-end" >{{$stat}}</p>
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
                            src="{{asset('assets/front/images/ass/q3.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                <p class="timetable" >Today Quizes</p>
                                <p class="text-end" >{{$today}}</p>
                            </p>
                          </div>
                        </div>
                      </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="head mt-4">
                <p><u>All Uploaded Attentive Quizes</u> :-</p>
            </div>
        </div>
        </div>
        <div class="col-4">
        <div class="d-card overflow-auto mt-3">
            <div class="card-header card-text">Submited Attentive Quizes
                <a href="{{route('attentive.sumitindex',[$classid,$subjectid])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View </button></a></div>
            <div class="card-body">
               <p class="card-header card-text">To Day Sheduled Quizes</p>
               <table class="table"><tr><th scope="col" class="mx-2">Title</th><th scope="col">Period</th><th scope="col">Status</th><th scope="col"></th></tr>
        @foreach ($list as $key=>$l )
               <tr>
               <td><p class="mx-2">{{$l->title}}</p></td>
               <td><p class="mx-2">{{$l->period}}</p></td>
               <td><p class="mx-2">{{$l->status}}</p></td>
               <td><p class="btn btn-warning btn-sm mx-4"><i class="bi bi-bell"></i></p></td>
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

    <div class="table-card">
        <div class="text-end">
            <div class="row">
                <form action="?" class="col-sm-2 me-auto" >
                    <div class="input-group">
                        <button type="submit" class="btn btn-primary"> Go!</button>
                        <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">

                     </div>
                </form>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Attentiveness Quize</button>
            </div>

            </div>

            {{-- <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit" value="Create Assesment"> --}}
        </div>
<div class="col-9">
        @if (session('message'))
                <div class="alert alert-success" role="alert">
                    {{ session('message') }}
                </div>
        @endif
    <table class="table table-success table-hover m-0">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Title</th>
              <th scope="col">Term</th>
              <th scope="col">Week</th>
              <th scope="col">Date</th>
              <th scope="col">Period</th>
              <th scope="col">Duration</th>
              <th scope="col">Status</th>
              <th scope="col">AddQuestions</th>
              <th scope="col"></th>

            </tr>
          </thead>
          <tbody>
            @if(count($quizes)>0)
              @foreach($quizes as $key=> $quiz)
            <tr>
              <th scope="row">{{$key+1}}</th>
              <td>{{$quiz->title}}</td>
              <td>{{$quiz->term}}</td>
              @if ($quiz->week==null)
              <td>{{$quiz->extra_week}}</td>
            @else
                <td>{{$quiz->week}}</td>
            @endif
              <td>{{$quiz->date}}</td>
              <td>{{$quiz->period}}</td>
              <td>{{$quiz->quiz_duration}}</td>
              <td>{{$quiz->status}}</td>
              <td>
                @if($quiz->status=='draft')
                <button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$quiz->id}}" >Add Question</td>
                @else
                <button class="btn btn-success btn-sm" disabled data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$quiz->id}}" >Add Question</td>
                @endif
                <td class="btn-toolbar">
                @if($quiz->status=='draft')
                <button class="btn btn-primary btn-sm " data-bs-toggle="modal"  data-bs-target="#editattModal" data-bs-id="{{$quiz->id}}" data-bs-title="{{$quiz->title}}"
                    data-bs-term="{{$quiz->term}}" data-bs-week="{{$quiz->week}}" data-bs-extra_week="{{$quiz->extra_week}}" data-bs-day="{{$quiz->date}}" data-bs-period="{{$quiz->period}}"
                    data-bs-duration="{{$quiz->quiz_duration}}"><i class="bi bi-pencil-square "></i> </button>
                @else
                <button class="btn btn-primary btn-sm mx-1"  disabled><i class="bi bi-pencil-square "></i> </button>
                @endif
                <button  class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteattModal" data-bs-id="{{$quiz->id}}"><i class="bi bi-trash"></i></button>
                  <form action="{{route('attentive.status',$quiz->id)}}" method="POST">@csrf
                      @if($quiz->status=='draft')
                      <button class="btn btn-success btn-sm mx-1" type="submit" name="status" value="published" ><i class="bi bi-upload"></i></button>
                        {{-- <input type="submit" name="status" value="{{}}" class="btn btn-success btn-sm "> --}}
                      @else
                      <button class="btn btn-success btn-sm mx-1" disabled><i class="bi bi-upload"></i></button>
                      @endif

              </form>
              <a href="{{route('att.quizshow',[$quiz->id])}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a>
            </td>

              <!-- <div id="id01" class="modal">
                  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
                  <form class="modal-content" action="/action_page.php">
                    <div class="container">
                      <h1>Delete Account</h1>
                      <p>Are you sure you want to delete your account?</p>

                      <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="deletebtn">Delete</button>
                      </div>
                    </div>
                </form>
                </div> -->
            </tr>
            @endforeach


            @else
            <p>No Attentiveness Check assign yet</p>
            @endif
          </tbody>
        </table>
</div>

    </div>

{{-- modal for create --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Add a Attentiveness Check for the Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.attentiveness')
        </div>
    </div>
  </div>
</div>

{{-- modal for Question --}}
<div class="modal fade" id="qModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="exampleModalLabel" >Add a Question</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.attentivequestion')
        </div>

    </div>
  </div>
</div>

{{-- modal for edit --}}
<div class="modal fade" id="editattModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit the Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.attedit')
        </div>
    </div>
  </div>
</div>


{{-- delete modal --}}
<div class="modal fade" id="deleteattModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Delete A Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            <form action="{{route('att.delete')}}" method="post"> @method('delete')
                @csrf
                <h5>Are you Shure You want to delete this record</h5>
                <input type="hidden" id="quizid" name="quizid" >


                <div class="form-group">
                    <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NO</button>
                     <button class="btn btn-danger" type="submit">Yes</button>
                   </div>
                 </div>

            </form>

        </div>
    </div>
  </div>
</div>





<script src="{{asset('assets/front/js/optionselector.js')}}"></script>


@endsection





