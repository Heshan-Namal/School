@foreach($detail as $key=> $d)
@extends('layouts.MasterDashboard')
@endforeach

@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">

<div class="content">
    <div class="row hh mb-2">
        <div class="col-8">
        <div class="row">
        <div class="card">
            <form action="#" method="GET" class="form-inline">@csrf
            <div class="form-group row">
                <h4 class="timetable mb-2 mt-3">View All Assessments</h4>
                    <div class="col-sm-3" >
                        <select name="term" id="term" onchange="getselector(this.value);" class="form-control">
                            <option value="" value="" disabled selected>Select Term</option>
                            <option value="allt" selected>All terms</option>
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
        <div class="row mb-4">
            <div class="col-4">
                <div class="box-card">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/ass.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                               All Assessments<br>
                               <span class="value rounded-circle ms-5">
                                {{$allnum}}
                            </span>
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
                           Unublished Assessments
                            <p class="text-end" >{{$pubnum}}</p>
                        </p>
                      </div>
                    </div>
                  </div>
                </div>

            </div>
            <div class="col-4">
                <div class="box-card ">
                    <div class="row g-0">
                        <div class="col-md-4 mt-3">
                          <img
                            src="{{asset('assets/front/images/ass/expired.png')}}"
                            alt="Trendy Pants and Shoes"
                            class="img-fluid rounded-start d-flex mx-2"
                          />
                        </div>
                        <div class="col-md-8">
                          <div class="card-body">
                            <p class="card-text">
                                Expired Assessments
                                <p class="text-end " >{{$exnum}}</p>
                            </p>
                          </div>
                        </div>
                      </div>

                </div>

            </div>
        </div>
        <div class="row">
            <div class="head mt-4">
                <p><u>Assessments</u> :-</p>
            </div>
        </div>
        </div>
        <div class="col-4">
            <div class="d-card overflow-auto mt-3 ">
                <div class="card-header colo card-text">View Overdue Assessments
                    <a href="{{route('ass.sumitindex',[$classid,$subjectid])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View </button></a></div>
                    <div class="card-body  ">
                    <p class="card-header">List of Due Assessments</p>
                    <table class="table "><tr><th scope="col" class="mx-2">Assessment</th><th scope="col">Due Date</th><th scope="col"></th></tr>
                        @foreach($nearex as $key=> $n)
                        <tr>
                        <td><p class="mx-2">{{$n->title}}</p></td>
                        <td><p class="mx-2">{{$n->due_date}}</p></td>
                        <td><p class="btn btn-danger btn-sm mx-4"><i class="bi bi-bell"></i></p></td>
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


        <div class="text-end">
            <div class="row">

            <form action="?" class="col-sm-2 me-auto" >
                <div class="input-group">
                    <input type="text"  name="search" placeholder="Search" value="{{request()->search}}" class="form-control">
                    <button type="submit" class="btn btn-primary">Go!</button>
                 </div>
            </form>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add New Assessment</button>
            </div>

            </div>

            {{-- <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit" value="Create Assesment"> --}}
        </div>
        @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
        @endif
        @if($assments->count()>0)
    <table class="table table-success table-hover m-0">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Term</th>
          <th scope="col">Week</th>
          <th scope="col">Assigned Day</th>
          <th scope="col">Due Date</th>
          <th scope="col">Assessment Type</th>
          <th scope="col">Assessment</th>
          <th scope="col">View</th>
          <th scope="col">Allocated Marks</th>
          <th scope="col">Status</th>
          <th scope="col"></th>
        </tr>
        </thead>

        <tbody>


          @foreach($assments as $key=> $ass)
        <tr>
          <th scope="row">{{$key+1}}</th>
          <td>{{$ass->title}}</td>
          <td>{{$ass->description}}</td>
          <td>{{$ass->term}}</td>
            @if ($ass->week==null)
                <td>{{$ass->extra_week}}</td>
            @else
                    <td>{{$ass->week}}</td>
            @endif
          <td>{{$ass->day}}</td>
          <td>{{$ass->due_date}}</td>
          <td>{{$ass->assessment_type}}</td>
          @if($ass->assessment_type == 'mcq_quiz')
            @if($ass->status=='published')
            <td><button class="btn btn-success btn-sm" disabled data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$ass->id}}">Add Question</td>
            @else
            <td><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$ass->id}}">Add Question</td>
            @endif
            <td><a href="{{route('ass.quizshow',[$ass->id])}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
          @else
          <td>{{$ass->assessment_file}}</a></td>
          <td><a class="Link" href="http://127.0.0.1:8000/assignments/{{$ass->assessment_file}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
          @endif
          <td>{{$ass->allocated_marks}}</td>
          <td>{{$ass->status}}</td>
          <td class="btn-toolbar">
            @if($ass->status=='published')
            <button class="btn btn-primary btn-sm " disabled><i class="bi bi-pencil-square"></i></button>
            <button  class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$ass->id}}"><i class="bi bi-trash"></i></button>
            <button id="published" class="btn btn-success btn-sm mx-1" type="submit" name="status" value="published" disabled><i class="bi bi-upload"></i></button>
            @else
          <button class="btn btn-primary btn-sm " data-bs-toggle="modal"  data-bs-target="#editassModal" data-bs-id="{{$ass->id}}" data-bs-title="{{$ass->title}}" data-bs-description="{{$ass->description}}"
            data-bs-term="{{$ass->term}}" data-bs-week="{{$ass->week}}" data-bs-extra_week="{{$ass->extra_week}}" data-bs-day="{{$ass->day}}" data-bs-due_date="{{$ass->due_date}}" data-bs-assessment_type="{{$ass->assessment_type}}"
            data-bs-allocated_marks="{{$ass->allocated_marks}}" data-bs-assessment_file="{{$ass->assessment_file}}" ><i class="bi bi-pencil-square "></i> </button>
            <button  class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$ass->id}}"><i class="bi bi-trash"></i></button>
            <form action="{{route('ass.status',[$ass->id])}}" method="POST">@csrf
            <button id="published" class="btn btn-success btn-sm mx-1" type="submit" id="pub" name="status" value="published"><i class="bi bi-upload"></i></button>
        </form>
        @endif
        </td>




        </tr>

        @endforeach



        </tbody>
        @else
        <div class="d-flex justify-content-center mb-5">
            <div class="search-card">
                <div class="row"><h4 class="search-font ">Can't find any Records</h4></div>
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
        </table>
        <div class="pagination justify-content-end mt-3">
        {!! $assments->links() !!}
        </div>
</div>

{{-- modal for create --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Add New Assessment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.asscreate')
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
            @include('teacher.Models.q_create')
        </div>
    </div>
  </div>
</div>

 {{-- modal for edit --}}
 <div class="modal fade" id="editassModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit Assessment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.assedit')
        </div>
    </div>
  </div>
</div>
{{-- delete modal --}}
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title table del text-center" id="example1ModalLabel">Delete Assessment</h3>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.deletemodal')
        </div>
    </div>
  </div>
</div>







<script src="{{asset('assets/front/js/optionselector.js')}}"></script>


@endsection





