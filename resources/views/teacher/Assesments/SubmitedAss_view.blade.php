@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-4">
            <div class="box-card">
                <div class="card-body">
                    <p class="timetable" >Late Submission Students</p>
                    <p class="text-end" >Published</p>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div class="box-card">
                <div class="card-body">
                    <p class="timetable" >In this week Expired Assesments</p>
                    <p class="text-end" >Published</p>
                </div>
            </div>

        </div>
        <div class="col-4">
            <div class="box-card">
                <div class="card-body">
                    <p class="timetable" >Num of Students Notsubmit any Assesments</p>
                    <p class="text-end" >Published</p>
                </div>
            </div>

        </div>
    </div>
    <div class="row">
    <div class="col-8"></div>
    <div class="col-4">
        <div class="d-card mt-3">
            <div class="card-header timetable">View Submited Assesments</div>
            <div class="card-body">
               <table class="overflow-y:auto;">
                <div class="card-header mx-4">
                    <tr><th>Title</th><th>Submits</th></tr>
                </div>
               <tr>
               <td><p class="mx-4">rounded</p></td>
               <td><p class="mx-4 rounded-circle">rounded</p></td>
               </tr>
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
    <div class="row">
<table class="table">
    <thead>

    <tr>
      <th scope="col">#</th>
      <th scope="col">name</th>
      <th scope="col">submisson file</th>
      <th scope="col">uploaded date</th>
      <th scope="col">marks</th>

    </tr>
    </thead>
    <tbody>
        @if($sub->count()>0)

        @foreach($sub as $key=> $s)
    <tr>
      <th scope="row">{{$key+1}}</th>
      <td>{{$s->name}}</td>
      @if($s->type == 'file')
        <td>{{$s->file}}</td>
        @else
        <td>Type is MCQ</td>
      @endif
      <td>{{$s->date}}</td>
      @if(($s->marks != null) && ($s->type != 'mcq'))
        <form action="{{route('update.marks',[$s->id])}}" method="POST" > @method('PUT') @csrf
        <td><input type="text" disabled name="marks" value="{{$s->marks}}" class="col-sm-2" id="marks{{$s->id}}">
        <input type="submit" hidden name="save" value="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$s->id}}" >
        </form>
        <input type="submit" name="edit" value="edit Marks" class="btn btn-success btn-sm " onclick="editmarks({{$s->id}});" id="edit{{$s->id}}"></td>

      @elseif (($s->marks == null) && ($s->type != 'mcq'))
      <td><input type="submit" value="Enter Marks" id="enter{{$s->id}}" class="btn btn-warning btn-sm " onclick="entermarks({{$s->id}});">
      <form action="{{route('update.marks',[$s->id])}}" method="POST" > @method('PUT') @csrf
      <input type="text" hidden name="marks" class="col-sm-2" id="marks{{$s->id}}">
        <input type="submit" hidden name="save" value="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$s->id}}" ></td>
    </form>
      @endif




    </tr>

    @endforeach



    @else
    <p>No Assesments assign yet</p>
    @endif

    </tbody>
    </table>
    </div>
</div>
    <script src="{{asset('assets/front/js/subass.js')}}"></script>
    @endsection
