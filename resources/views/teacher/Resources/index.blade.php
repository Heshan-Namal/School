@extends('layouts.MasterDashboard')

@section('content')
<div class="content">
    <div class="row hh">
        <div class="col-8">
        <div class="card">
            <form action="#" method="GET" class="form-inline">@csrf
            <div class="form-group row">
                <h4 class="timetable">Uploded Resources</h4>
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
            <div class="card-header table">View Submited Assesments</div>
            <div class="card-body">
                <p>3 students submit ass1</p>
                <p>4 students submit ass2</p>
            </div>

        </div>

    </div>
    <div class="table-card mt-5">
        <div class="text-end">
            <button type="submit" class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Resource</button>
            {{-- <input type="submit" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit" value="Create Assesment"> --}}
        </div>
    <table class="table table-success table-hover m-0">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Chapter</th>
            <th scope="col">Term</th>
            <th scope="col">Week</th>
            <th scope="col">Day</th>
            <th scope="col">Resources Type</th>
            <th scope="col">Resource</th>
            <th scope="col">View</th>
            <th scope="col"></th>
        </tr>
        </thead>

        <tbody>


            @if($res->count()>0)

            @foreach($res as $key=> $r)
          <tr>
            <th scope="row">{{$key+1}}</th>
            <td>{{$r->chapter}}</td>
            <td>{{$r->term}}</td>
            @if ($r->week==null)
                <td>{{$r->extra_week}}</td>
            @else
                  <td>{{$r->week}}</td>
            @endif
            <td>{{$r->day}}</td>
            <td>{{$r->resource_type}}</td>
            @if($r->resource_type == 'reference_link')
            <td>{{$r->resource_file}}</a></td>
              <td><a href="{{$r->resource_file}}"><button class="btn btn-primary btn-sm">View</button></a> </td>
            @elseif ($r->resource_type == 'clink')
              <td>{{$r->resource_file}}</a></td>
              <td><a href="{{$r->resource_file}}"><button class="btn btn-primary btn-sm">View</button></a> </td>
            @else
              <td>{{$r->resource_file}}</a></td>
              <td><a href="http://127.0.0.1:8000/notes/{{$r->resource_file}}"><button class="btn btn-primary btn-sm">View</button></a> </td>
            @endif
            <td class="btn-toolbar">
                <button class="btn btn-primary btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-pencil-square "></i> </button>
                <button class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></button>
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

{{-- modal for create --}}
<div class="modal fade" id="createmodal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Add a Assesments for the Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.rescreate')
        </div>
    </div>
  </div>
</div>








<script src="{{asset('assets/front/js/resourcesselector.js')}}"></script>


@endsection





