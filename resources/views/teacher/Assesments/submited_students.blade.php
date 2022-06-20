@extends('layouts.MasterDashboard')
@section('content')
<div class="content">
    <div class="row">
        <div class="col-3">
        <div class="sub-card">
            <div class="card-body">
                <p class="timetable">Numer of Students submit Assesment</p>
                <p>{{$nums}}</p>
            </div>
        </div>
        </div>
        <div class="col-3">
            <div class="sub-card">
                <div class="card-body">
                    <p class="timetable">Num Students Late Submissions</p>
                    <p>{{$late}}</p>
                </div>
            </div>
            </div>
            <div class="col-3">
                <div class="sub-card">
                    <div class="card-body">
                        <p class="timetable">Not add marks for Submission</p>
                        <p>{{$mar}}</p>
                    </div>
                </div>
                </div>
                <div class="col-3">
                    <div class="sub-card">
                        <div class="card-body">
                            <p class="timetable">Num Students not submited Assesment</p>
                            <p>{{$notsub}}</p>

                        </div>
                    </div>
                    </div>
    </div>

    <div class="row">
        <div class="col-8">

                @if (session('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session('message') }}
                    </div>
                @endif

<div class="table-card mt-5">
    <table class="table table-success table-hover m-0">
            <thead>

            <tr>
              <th scope="col">#</th>
              <th scope="col">name</th>
              <th scope="col">submisson file</th>
              <th scope="col">Due Date</th>
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
              @if($s->type == 'upload_file')
                <td>{{$s->file}}</td>
                @else
                <td>Type is MCQ</td>
              @endif
              <td>{{$s->due_date}}</td>
              <td>{{$s->date}}</td>
              @if(($s->marks != null) && ($s->type != 'mcq_quiz'))
                <form action="{{route('update.marks',[$s->id])}}" method="POST" > @method('PUT') @csrf
                <td><input type="text" disabled name="marks" value="{{$s->marks}}" class="col-sm-2" id="marks{{$s->id}}">
                <button type="submit" hidden name="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$s->id}}" ><i class="bi bi-check2-circle"></i></button>
                </form>
                <button type="submit" name="edit" class="btn btn-success btn-sm " onclick="editmarks({{$s->id}});" id="edit{{$s->id}}"><i class="bi bi-pencil-square "></i></button></td>

              @elseif (($s->marks == null) && ($s->type != 'mcq_quiz'))
              <td><input type="submit" value="Enter Marks" id="enter{{$s->id}}" class="btn btn-warning btn-sm " onclick="entermarks({{$s->id}});">
              <form action="{{route('update.marks',[$s->id])}}" method="POST" > @method('PUT') @csrf
              <input type="text" hidden name="marks" class="col-sm-2" id="marks{{$s->id}}">
              <button type="submit" hidden name="save" class="btn btn-primary btn-sm col-sm-2" id="save{{$s->id}}" ><i class="bi bi-check2-circle"></i></button>
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
        <div class="col-4">
            <div class="d-card mt-3">
                <div class="card-header timetable">Highest Marks In the Class</div>
                <div class="card-body">

                   <table><tr><th class="col">Admision_No</th><th class="col">Name</th><th>Marks</th></tr>
                 @foreach($hm as $key=> $h)
                   <tr>
                   <td><p class="mx-4">{{$h->admission_no}}</p></td>
                   <td><p class="mx-4">{{$h->full_name}}</p></td>
                   <td><p class="mx-4">{{$h->assessment_marks}}</p></td>
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
<script src="{{asset('assets/front/js/subass.js')}}"></script>

@endsection
