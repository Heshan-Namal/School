@extends('layouts.MasterDashboard')

@section('content')
<div class="content">
    <div class="row hh">
        <div class="col-8">
        <div class="card">
            <form action="#" method="GET" class="form-inline">@csrf
            <div class="form-group row">
                <h4 class="timetable">Uploded Assesments</h4>
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

                <div class="col-sm-3">
                <select name="day" id="day" class="form-control ">
                    <option value="" value="" disabled selected>Select Day</option>
                        <option value="monday">Monday</option>
                        <option value="tuesday">Tuesday</option>
                        <option value="wensday">Wendsday</option>
                        <option value="thursday">Tursday</option>
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
        <div class="col-4">
        <div class="d-card mt-3">
            <div class="card-header table">View Submited Assesments
            <a href="{{route('ass.sumitindex',[$classid,$subjectid])}}"><button type="button" class="btn btn-primary rounded-pill mx-3">View </button></a></div>
            <div class="card-body">
                <p>3 students submit ass1</p>
                <p>4 students submit ass2</p>
            </div>

        </div>

    </div>
    <div class="table-card mt-5">
        <div class="text-end">
            <button type="submit" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Assesment</button>
            {{-- <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit" value="Create Assesment"> --}}
        </div>
        @if($assments->count()>0)
    <table class="table table-success table-hover m-0">
        <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Title</th>
          <th scope="col">Description</th>
          <th scope="col">Term</th>
          <th scope="col">Week</th>
          <th scope="col">Assigned_day</th>
          <th scope="col">Due Date</th>
          <th scope="col">Assesment Type</th>
          <th scope="col">Assesment</th>
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
            <td><button class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#qModal" data-bs-id="{{$ass->id}}" >Add Question</td>
            <td><a href="{{route('ass.quizshow',[$ass->id])}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
          @else
          <td>{{$ass->assessment_file}}</a></td>
          <td><a class="Link" href="http://127.0.0.1:8000/assignments/{{$ass->assessment_file}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
          @endif
          <td>{{$ass->allocated_marks}}</td>
          <td>{{$ass->status}}</td>
          <td class="btn-toolbar">
            @if($ass->status=='draft')
                <button class="btn btn-primary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square "></i> </button>
            @else
            <button class="btn btn-primary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal" disabled><i class="bi bi-pencil-square "></i> </button>
            @endif
         <button class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>
          <form action="#" method="POST">@csrf
              @if($ass->status=='draft')
              <button class="btn btn-success btn-sm mx-1" ><i class="bi bi-upload"></i></button>
                {{-- <input type="submit" name="status" value="{{}}" class="btn btn-success btn-sm "> --}}
              @else
              <button class="btn btn-success btn-sm mx-1" disabled><i class="bi bi-upload"></i></button>
              @endif
            </td>


          </form>

        </tr>

        @endforeach



        </tbody>
        @else
        <div class="table-card">
        <div class="card-header">No Assesments assign yet</div>
        <div class="card-body">
        <img src="{{asset('assets/front/images/notfound.jpg')}}" alt="...">
        </div>
        </div>
        @endif
        </table>


    </div>





</div>

{{-- modal for create --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Add a Assesments for the Class</h5>
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







<script src="{{asset('assets/front/js/optionselector.js')}}"></script>


@endsection





