@extends('layouts.MasterDashboard')

@section('content')
<link rel="stylesheet" href="{{asset('assets/front/css/Ass.css')}}">
<div class="content">
    <div class="row hh">
        <div class="col-8">
        <div class="card">
            <form action="#" method="GET" class="form-inline">@csrf
            <div class="form-group row">
                <h4 class="timetable mb-2 mt-3">Uploded Resources</h4>
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
        <div class="row mt-5">
            <div class="col-12 re">
            <div class="d-card overflow-auto">
                <div class="card-header colo card-text">Recently Uploaded Class Link</div>
                <div class="card-body">
                    <table class="table"><tr><th scope="col">Chapter</th><th scope="col">Link</th><th scope="col">Date</th></tr>
                        @foreach($clink as $key=> $c)
                        <tr>
                        <td><p >{{$c->chapter}}</p></td>
                        <td><p>{{$c->resource_file}}</p></td>
                        <td><p >{{ \Carbon\Carbon::parse($c->created_at)->format('d/m/Y') }}</p></td>
                        </tr>
                        @endforeach
                        </table>
                </div>

            </div>
            </div>
    </div>
        </div>
    <div class="col-4 mt-3">
        <div class="d-card overflow-auto ">
            <div class="card-header colo card-text">Recently Uploaded Notes</div>
            <div class="card-body  ">
                <table class="table"><tr><th scope="col">Chapter</th><th scope="col">Note</th><th scope="col">Date</th></tr>
                    @foreach($note as $key=> $n)
                    <tr>
                    <td><p >{{$n->chapter}}</p></td>
                    <td><a href="http://127.0.0.1:8000/notes/{{$n->resource_file}}"><p >{{$n->resource_file}}</p></a></td>
                    <td><p >{{ \Carbon\Carbon::parse($n->created_at)->format('d/m/Y') }}</p></td>
                    </tr>
                    @endforeach
                    </table>
            </div>
        </div>

        </div>


        <div class="row mt-2">
            <div class="head">
                <p><u>Uploaded All Resources</u> :-</p>
            </div>
        </div>
        <div class="text-end">
            <div class="row">

            <form action="?" class="col-sm-2 me-auto" >
                <div class="input-group">
                    <button type="submit" class="btn btn-primary"> Go!</button>
                    <input type="text"  name="search" placeholder="Search"  value="{{request()->search}}" class="form-control">

                 </div>
            </form>
            <div class="col-3">
                <button type="submit" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#createmodal" name="submit"><i class="bi bi-plus mx-1"></i>Add Resource</button>
            </div>

            </div>
        </div>

        @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
        @endif
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
              <td><a href="{{$r->resource_file}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
            @elseif ($r->resource_type == 'clink')
              <td>{{$r->resource_file}}</a></td>
              <td><a href="{{$r->resource_file}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
            @else
              <td>{{$r->resource_file}}</a></td>
              <td><a href="http://127.0.0.1:8000/notes/{{$r->resource_file}}"><button class="btn btn-primary btn-sm"><i class="bi bi-binoculars-fill"></i></button></a> </td>
            @endif
            <td class="btn-toolbar">
                    <button class="btn btn-primary btn-sm " data-bs-toggle="modal"  data-bs-target="#editresModal" data-bs-id="{{$r->id}}" data-bs-chapter="{{$r->chapter}}" data-bs-topic="{{$r->topic}}"
                    data-bs-term="{{$r->term}}" data-bs-week="{{$r->week}}" data-bs-extra_week="{{$r->extra_week}}" data-bs-day="{{$r->day}}" data-bs-resource_type="{{$r->resource_type}}"
                    data-bs-resource_file="{{$r->resource_file}}" ><i class="bi bi-pencil-square "></i> </button>
                    <button  class="btn btn-danger btn-sm mx-1" data-bs-toggle="modal" data-bs-target="#deleteresModal" data-bs-id="{{$r->id}}"><i class="bi bi-trash"></i></button>
            </td>

          </tr>

          @endforeach
          <table class="table">
          <tbody id="content">

          </tbody>
          </table>

          @else
          <p>No Assesments assign yet</p>
          @endif



        </tbody>

        </table>









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
    </div>


    {{-- modal for edit --}}
 <div class="modal fade" id="editresModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Edit an Assesments for the Class</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            @include('teacher.Models.resedit')
        </div>
    </div>
  </div>
</div>

{{-- delete modal --}}
<div class="modal fade" id="deleteresModal" tabindex="-1" aria-labelledby="example1ModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title table" id="example1ModalLabel">Delete A Record</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body table">
            <form action="{{route('res.delete')}}" method="post"> @method('delete')
                @csrf
                <h5>Are you Shure You want to delete this record</h5>
                <input type="hidden" id="resid" name="resid" >


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




<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="{{asset('assets/front/js/resourcesselector.js')}}"></script>


@endsection





