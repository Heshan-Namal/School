@extends('layouts.MasterDashboard')
@section('style')
<link rel="stylesheet" href="{{asset('assets/front/css/content.css')}}">
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
@endsection
@section('content')
<div class="container_AssStudent">
    <div class="row">
            <div class="row col-8">
                <div class="row g-3 mt-3 col-12 ">
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

                <div class="row g-3 mt-4 col-12 ">

                <form action="#" method="GET" class="row g-3">@csrf
                    <div class="col-md-5">
                        <label for="inputState" class="form-label">Select Term</label>
                        <select name="term" id="term" onchange="getselector(this.value);" class="form-control mt-0">
                            <option selected>Choose...</option>
                            <option value="allt" >All Terms</option>
                            <option value="term1">First Term </option>
                            <option value="term2">Second Term </option>
                            <option value="term3">Third Term</option>
                        </select>
                    </div>
                    <div class="col-md-5" id="day1" hidden>
                        <label for="inputState" class="form-label">Select Date</label>
                        <select name="day" id="day" class="form-control mt-0" aria-label="Default select example">
                            <option selected>Choose...</option>
                            <option value="monday">Monday</option>
                            <option value="tuesday">Tuesday</option>
                            <option value="wensday">Wednesday</option>
                            <option value="thursday">Thursday</option>
                            <option value="friday">Friday</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="submit" class="btn btn-primary" name="submit" value="View">
                    </div>
                </form>
            </div>
        </div>
        <div class="col-4">
            <header class ="mb-3">List of Due Assessments</header>
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Assessment</th>
                        <th>Due Date</th>
                        <th>Notify</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($nearex as $key=> $n)
                        <tr>
                            <td>{{$n->title}}</td>
                            <td>{{$n->due_date}}</td>
                            <td><button class="btn btn-warning btn-sm mx-4"><i class="bi bi-bell"></i></button></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                <div class="pagination justify-content-end mt-3">
                    {!! $nearex->links() !!}
                </div>
                <div class="row d-flex justify-content-center">
                    <div class="input-group"><header>View Submissions</header>
                        <a href="{{route('ass.sumitindex',[$classid,$subjectid])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View </button></a></div>
                </div>
        </div>
    </div>


    <div class="row">
        <div class="col-4 justify-content-start">
            <header>View All Resources</header>
        </div>
        <div class="col-8 g-2 input-group justify-content-end">
            <div class="col-2 mx-2">
                <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">
            </div>
                <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add New Assessment</button>
        </div>
    </div>
    {{-- <header class ="mb-2">View All Resources</header>
    <div class="row g-3 mt-2">
        <form action="?" >
            <div class="input-group">
                <div class="form-outline row">
                    <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">

                </div>
            </div>
        </form>
        <div class="text-end">
            <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add New Assessment</button>
        </div>
    </div> --}}


    @if (session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @elseif (session('error'))
    <div class="alert alert-danger" role="alert">
        {{ session('error') }}
    </div>
    @endif


    @if($assments->count()>0)
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>#</th>
                <th>Title</th>
                <th>Term</th>
                <th>Published Week</th>
                <th>Published Day</th>
                <th>Due Date</th>
                <th>Assessment Type</th>
                <th>Assessment</th>
                <th>View</th>
                <th>Status</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($assments as $key=> $ass)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$ass->title}}</td>
                <td>{{$ass->term}}</td>
                <td>{{$ass->week}}</td>
                <td>{{$ass->day}}</td>
                <td>{{$ass->due_date}}</td>
                <td>{{$ass->assessment_type}}</td>



            @if($ass->assessment_type == 'mcq_quiz')
                    @if($ass->status=='published')

                <td><button class="btn btn-success btn-sm" disabled >Add Question</td>

                    @else

                <td><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$ass->id}}">Add Question</td>

                    @endif

                <td><a href="{{route('ass.quizshow',[$ass->id])}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>

            @else

                <td>{{$ass->assessment_file}}</a></td>
                <td><a class="Link" href="http://127.0.0.1:8000/assignments/{{$ass->assessment_file}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>

            @endif

                <td>{{$ass->status}}</td>

          <td>

                    @if($ass->status=='published')

                    <button class="btn btn-primary btn-sm " disabled><i class="bi bi-pencil-square"></i></button>
                    <button  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$ass->id}}"><i class="bi bi-trash"></i></button>
                    <button id="published" class="btn btn-success btn-sm" type="submit" name="status" value="published" disabled><i class="bi bi-upload"></i></button>

                    @else

                    <button class="btn btn-primary btn-sm " data-bs-toggle="modal"  data-bs-target="#editassModal" data-bs-id="{{$ass->id}}" data-bs-title="{{$ass->title}}" data-bs-description="{{$ass->description}}"
                        data-bs-term="{{$ass->term}}" data-bs-week="{{$ass->week}}"  data-bs-day="{{$ass->day}}" data-bs-due_date="{{$ass->due_date}}" data-bs-assessment_type="{{$ass->assessment_type}}"
                        data-bs-assessment_file="{{$ass->assessment_file}}" ><i class="bi bi-pencil-square "></i> </button>

                    <button  class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal" data-bs-id="{{$ass->id}}"><i class="bi bi-trash"></i></button>
                    {{-- <form  action="{{route('ass.status',[$ass->id])}}" method="POST">@csrf --}}
                        <button id="published" class="btn btn-success btn-sm" type="submit" id="pub" name="status" value="published"><i class="bi bi-upload"></i></button>
                    </form>

                    @endif
        </td>


            </tr>
            @endforeach
            <div class="pagination justify-content-end mt-3">
                {!! $assments->links() !!}
            </div>
        </tbody>
    </table>
    @else
    <div class="d-flex justify-content-center mt-5">
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
